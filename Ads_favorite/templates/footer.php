</section>
<footer>
    <hr>
    <a href="#">© The Entertainer Prod.</a> | <a href="#">Mentions légales</a> | <button class="nightmode">Night Mode</button> | 2022
</footer>
<script type="text/javascript" language="Javascript">
        var nightmode = document.querySelector(".nightmode");
        nightmode.addEventListener("click", ()=> {
            var body = document.querySelector('body');
            body.classList.toggle('darkmode');
        });
        $(document).ready(function() {
            $('#navbarDropdown').mouseenter(function() {
                $('.dropdown-menu').slideToggle(300, "linear");
            });
  
            $('.dropdown-menu').mouseleave(function() {
                $(this).slideToggle(300, "linear");
            });
        });
</script>
</body>
</html>
