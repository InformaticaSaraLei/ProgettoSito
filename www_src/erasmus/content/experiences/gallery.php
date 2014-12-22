<?php
?>

<script>
    var images = new Array();
    images.push({img: 'https://scontent-a-mxp.xx.fbcdn.net/hphotos-xaf1/v/t1.0-9/10302272_752401401474436_4469052670059194585_n.jpg?oh=9b60ef13d1e57f758688590e88215171&oe=550C4C62'},
        {img: 'https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-xpa1/v/t1.0-9/10846395_750948074953102_779647762239347670_n.jpg?oh=60251fba0d16670d382c94000e015e53&oe=54F962EA&__gda__=1426024151_9c790b58a24fab90f1f3b30c7e1dda14'})
</script>

<div class="row">
    <div class="row">
        <div class="col-xs-3"><a href="#" title="Image 1"><img src="/ProgettoSito/www_src/erasmus/img/esn1.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 2"><img src="/ProgettoSito/www_src/erasmus/img/esn2.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 3"><img src="/ProgettoSito/www_src/erasmus/img/esn3.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 4"><img src="/ProgettoSito/www_src/erasmus/img/esn4.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 5"><img src="/ProgettoSito/www_src/erasmus/img/esn5.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 6"><img src="/ProgettoSito/www_src/erasmus/img/esn6.jpg"
                                                               class="thumbnail img-responsive"></a></div>
        <div class="col-xs-3"><a href="#" title="Image 7"><img src="/ProgettoSito/www_src/erasmus/img/esn7.jpg"
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