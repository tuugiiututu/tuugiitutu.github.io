<div class="col-2">
    <h5>
       Welcome - Admin
    </h5>
    <nav id="sidebar">
        <div id="myDIV">
            <ul class="list-unstyled components ">
                <li class="active navBTN p-0">
                    <a href="/admin/makeMenu">Menu Maker <hr></a>
                </li>
                <li  class="navBTN p-0">
                    <a href="#">Post Maker <hr></a>
                </li>
                <li class="navBTN p-0">
                    <a href="#">Post List <hr></a>
                </li>
            </ul>
        </div>
    </nav>

</div>

<script>
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("navBTN");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace("active", "");
      this.className += " active";
      });
    }
</script>
