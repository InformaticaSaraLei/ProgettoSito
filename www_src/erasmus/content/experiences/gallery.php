<?php
?>

<div class="row">
    <div class="row">
        <div class="col-xs-3"><a href="#" title="Image 1"><img src="http://i.imgur.com/Rz6xPzf.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 2"><img src="http://i.imgur.com/66GvL4m.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 3"><img src="http://i.imgur.com/XxQGBHD.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 4"><img src="http://i.imgur.com/vD1Eb8b.jpg"
                                                               class="thumbnail img-responsive"></a></div>
    </div>
    <div class="row">
        <div class="col-xs-3"><a href="#" title="Image 5"><img src="http://i.imgur.com/EXALhNg.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 6"><img src="http://i.imgur.com/euOgoIV.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 7"><img src="http://i.imgur.com/nqvak01.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 8"><img src="http://i.imgur.com/5OFR8F5.jpg"
                                                               class="thumbnail img-responsive"></a></div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3 class="modal-title">Heading</h3>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $('.thumbnail').click(function () {

        $('.modal-body').empty();
        var title = $(this).parent('a').attr("title");
        $('.modal-title').html(title);
        $($(this).parents('div').html()).appendTo('.modal-body');
        $('#myModal').modal({show: true});
        setModalContent($(this).data('thumb'));
    });
</script>


<script>

    function setModalContent($thumbNumber) {
        $('#myModal .modal-body img').last().attr('src', images[$thumbNumber].img);
        /* set next and previous buttons */
        $('.prev-img').data('thumb', ($thumbNumber - 1 >= 0) ? $thumbNumber - 1 : images.length - 1);
        $('.next-img').data('thumb', ($thumbNumber + 1 < images.length) ? $thumbNumber + 1 : 0);
    }

    $('.modal').on('click', '.prev-img', function () {
        setModalContent($(this).data('thumb'));
    });
    $('.modal').on('click', '.next-img', function () {
        setModalContent($(this).data('thumb'));
    });
</script>