<!-- Bootstrap css -->
  <!-- <link rel="stylesheet" href="css/bootstrap.css"> -->
  <link href="asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<p> Share Button: </p>
<div>
    <a  class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}"
    target="_blank">
    <i class="fa fa-facebook"></i>
    </a>
    <a class="btn btn-social-icon btn-twitter" href="https://www.twitter.com/sharer/sharer.php?u={{ urlencode($url) }}"
    target="_blank">
    <i class="fa fa-twitter"></i>
    </a>
    <a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/sharer/sharer.php?u={{ urlencode($url) }}"
    target="_blank">
    <i class="fa fa-instagram"></i>
    </a>
    <a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/sharer/sharer.php?u={{ urlencode($url) }}"
    target="_blank">
    <i class="fa fa-linkedin"></i>
    </a>
    <a class="btn btn-social-icon btn-telegram" href="https://web.telegram.com/sharer/sharer.php?u={{ urlencode($url) }}"
    target="_blank">
    <i class="fa fa-telegram"></i>
    </a>
    <a class="btn btn-social-icon btn-whatsapp" href="https://web.whatsapp.com/sharer/sharer.php?u={{ urlencode($url) }}"
    target="_blank">
    <i class="fa fa-whatsapp"></i>
    </a>
        <img src="{{ url('image/Auroralink.png') }}" class="img-fluid text-center" alt="Responsive image" width='500'>

</div>
<script src="{{ url('asset/js/jquery.min.js') }}"></script>
<script>
var = popupSize ={
    width: 780,
    height: 550
};

$($document).on('click', '.btn-social-icon > a', function(e){
    var verticalPost = Math.floor(($(window).width() - popupSize.width) / 2),
        horizontalPost = Math.floor(($(window).height() - popupSize.height) / 2),

    var popup = window.open($(this).prop('href'), 'social',
        'width'=+popupSize.width+',height='+popupSize.height+',left='+verticalPost+',top='+horizontalPost+',location=0,menubar=0,toolbar=0,status=0,scrollbars=1, resizable=1');

    if(popup){
        popup.focus();
        e.preventDefault()
    }
});
</script>
