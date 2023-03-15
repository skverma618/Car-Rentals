<nav class="topnavbar" id="topnavbar">
    <div class="logo">

        <a class="navbar-brand" href="../index.php">Rental<span>Cars</span></a>
    </div>
    <input type="checkbox" id="click">
    <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
    </label>

    <ul>
        <li><a class="aaa" href="../index.php">Home</a></li>
        <li><a class="aaa" href="../car-listings.php"> Car Listings </a></li>

        <li>
            <?php 
                if(isset($_SESSION['name'])){
                    
                    echo "<a onmouseenter='show_nav()' class='active name ' href='index.php'>".$_SESSION['name']."</a>";
                    
                    echo "<a id='logout' style='display:none;position: absolute;' class='logout active' href='../authentication/logout.php'> Logout </a>";
                }else{
                    echo "<br><a class='active' href='../authentication/index.php'> Login </a>";
                }
                ?>
        </li>
    </ul>
</nav>
<script>
function show_nav() {
    document.getElementById('logout').style.display = "block";
}
window.addEventListener('scroll', () => {
    var x = document.getElementsByClassName("aaa");
    for (var i = 0; i < x.length; i++) {
        x[i].style.csstext = `color:blue`;
    }
    document.getElementById("topnavbar").style.background = "white";
})
</script>