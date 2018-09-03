// require('./bootstrap');

(function(){
    var album_view_tpl = $($('#album_view_tpl').html());

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

    $('body').on('click', '.album',function(){
        $(this).siblings('.active').removeClass('active');
        $(this).addClass('active');
        //获取相册内容

    });

    $('body').on('click', '.album .move .up, .album .move .down', function(){
        var type = $(this).hasClass('up')? 'move_up': 'move_down';
        var album = $(this).parents('.album');
        var id = album.data('id');
        var sort = album.data('sort');
        axios.put('/catalog/'+id, {[type]: true}).then(function(response){
            GetAlbumList(id);
        });
    });

    //构造相册的阅览节点
    function ConstructViewAlbumNode(item){
        var node = album_view_tpl.clone();
        node.attr('data-id', item.id).attr('data-sort', item.sort);
        node.find('.name').text(item.name);
        return node;
    }
})();