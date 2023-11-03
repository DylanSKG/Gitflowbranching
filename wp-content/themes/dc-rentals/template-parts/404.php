
<style>
div.no_contents {
    height: auto;
    width: 100vw;
    position: relative;
    min-height: 53vh;
    display: grid;
    align-content: center;
    justify-content: center;
    justify-items: center;
}
img.p404 {
    height: auto;
    max-width: 31%;
    vertical-align: middle;
}

.no_contents div {
    font-size: 20px;
}

.no_contents div b{
    color:green;
}
</style><div class="no_contents">
    <h3>PAGE 404</h3>
    <img class="p404" src="https://rentals.beambuy.store/wp-content/uploads/2023/06/404.png" alt="404 page not found" />
    <div>The page you are looking for is not available! Check your URL. <b>PLease You will be redirected to your previous page after 10 Seconds</b></div>
    <h1 class='timer' data-minutes-left=1></h1>
    <h1 class='timer' data-seconds-left=30></h1>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
        crossorigin="anonymous"></script>
<script src="jquery.simple.timer.js"></script>
<script>
    setTimeout(() => { location.href = "<?php echo site_url(); ?>" }, 10000);
</script>


</div>