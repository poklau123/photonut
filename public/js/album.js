// require('./bootstrap');

(function(){
    var album_view_tpl = $($('#album_view_tpl').html());
    var post_view_tpl = $($('#post_view_tpl').html());

    var CATALOG_ID = null;

    //获取并设置相册列表
    function GetAlbumList(active_id){
        axios.get('/catalog').then(function(response){
            var data = response.data;
            var album_container = $('#album-container');
            album_container.empty();
            data.forEach(element => {
                album_container.append(ConstructViewAlbumNode(element));
            });
            if(active_id){
                album_container.find('.album[data-id='+active_id+']').addClass('active');
            }
        });
    }
    GetAlbumList();

    //获取并设置图文列表
    function GetPostList(catalog_id){
        var post_container = $('#post_container');
        post_container.empty();
        var viewer = $('<div></div>').addClass('viewer');
        post_container.append(viewer);
        //获取相册内容
        axios.get('/catalog/'+catalog_id+'/post').then(function(response){
            var data = response.data;
            data.forEach(element => {
                viewer.append(ConstructViewPostNode(element));
            });
            viewer.viewer({
                url: 'data-origin'
            });
        });
    }

    //相册点击
    $('body').on('click', '.album',function(e){
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        //使上传card可见
        $('#upload-container').css('visibility', 'visible');
        var catalog_id = $(this).data('id');
        CATALOG_ID = catalog_id;
        
        GetPostList(CATALOG_ID);
    });

    //相册移动
    $('body').on('click', '.album .move .up, .album .move .down', function(){
        var type = $(this).hasClass('up')? 'move_up': 'move_down';
        var album = $(this).parents('.album');
        var id = album.data('id');
        var sort = album.data('sort');
        axios.put('/catalog/'+id, {[type]: true}).then(function(response){
            GetAlbumList(id);
        });
    });

    //相册编辑
    $('body').on('click', '.album .edit', function(e){
        var album = $(e.target).parents('.album');
        var id = album.data('id');
        var name = album.find('.name').text();
        $('#album-modal').attr('data-id', id);
        $('#album-modal').find('input').val(name);
        $('#album-modal').modal('show');

        return false;
    });

    //相册删除
    $('body').on('click', '.album .delete', function(e){
        var album = $(e.target).parents('.album');
        var id = album.data('id');
        var del = window.confirm('确认要删除图册吗？这将删除相册下所有的图片');
        if(del){
            axios.delete('/catalog/'+id).then(function(response){
                $('#upload-container').css('visibility', 'hidden');
                GetAlbumList();
                $('#post_container').empty();
            });
        }

        return false;
    });

    $('#album-modal').on('hidden.bs.modal', function(){
        $(this).attr('data-id', undefined);
        $(this).find('.name').val('');
    });

    $('#album-submit').click(function(){
        var album = $(this).parents('div.modal');
        var id = album.data('id');
        var name = album.find('input').val();
        if(id){
            axios.put('/catalog/'+id, {name: name}).then(function(response){
                GetAlbumList(id);
            });
        }else{
            axios.post('/catalog', {name: name}).then(function(response){
                GetAlbumList(id);
            });
        }

        $('#album-modal').modal('hide');
    });

    //图片选择
    $('#upload-container .pic').change(function(){
        var temp_url = window.URL.createObjectURL($(this)[0].files[0]);
        $(this).parents('#upload-container').find('.image').attr('src', temp_url);
    });

    //上传新图册
    $('#upload-container #upload').click(function(){
        var upload_container = $('#upload-container');
        var title = upload_container.find('textarea[name=title]');
        var pic = upload_container.find('#upload-input-pic');
        var pic_preview = upload_container.find('img.image');
        pic.ajaxfileupload({
            action: '/catalog/'+CATALOG_ID+'/post',
            params: {
                title: title.val()
            },
            onStart: function(){
                upload_container._loading();
            },
            onComplete: function(response){
                upload_container._unloading();
                GetPostList(CATALOG_ID);
                title.val('');
                pic.val('');
                pic_preview.attr('src', '');
            }
        });
    });

    //删除图文
    $('#post_container').on('click', 'a.delete', function(){
        var post = $(this).parents('.post');
        var id = post.data('id');
        var del = window.confirm('确认要删除吗?');
        if(del){
            axios.delete('/catalog/'+CATALOG_ID+'/post/'+id).then(function(response){
                GetPostList(CATALOG_ID);
            });
        }
    });

    //构造相册的阅览节点
    function ConstructViewAlbumNode(item){
        var node = album_view_tpl.clone();
        node.attr('data-id', item.id).attr('data-sort', item.sort);
        node.find('.name').text(item.name);
        return node;
    }

    //构造图文节点
    function ConstructViewPostNode(item){
        var node = post_view_tpl.clone();
        node.attr('data-id', item.id);
        node.find('img').attr('src', item.compress_url).attr('data-origin', item.origin_url);
        node.find('.title').text(item.title);
        return node;
    }
})();