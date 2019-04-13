<?php
    include('../../views/header.php');
    if(!isset($_SESSION))
    {
        session_start();
    }

    //set skill array
    $skill_array = $_SESSION['skillArray'];
    // print_r($skill_array);
    // echo "<input type='hidden' id='skill_array' value='$skill_array'>";
?>

<style>
html {
  overflow-y: scroll;
}
</style>

<script type="text/javascript">document.title += " Employee Search"</script>

<div class="container">

    <h1 id="SearchHead">Employee Search</h1>

    <?php
	  //Verify user is Sales user or Admin
      if($_SESSION['role'] != "SALES" && $_SESSION['role'] != "ADMIN" && $_SESSION['role'] != "SUPERADMIN" )
      {
        echo "<h3> Login as a Sales Representative or Administrator to access this page </h3></div><hr></div></div>";}
      else{
    ?>
  <!---<h6 id="SearchInstructions">Enter a skill to search for employees</h6> -->
<!---<h6 id="SearchInstructions">Enter a skill to search for employees</h6> -->
    <hr>
</div>
</div>
<div class="container">
    <div class = "text-center">
	  <!-- Create Search Form -->
      <form class= "form-inline my-2 my-lg-0" action="search_controller.php" method="post">
        <!-- <font size="4">Hardware or Software Skill: &nbsp;</font> -->

        <div class="autocomplete" style="width:300px;">
          <input type="text" class="form-control mr-sm-2"  aria-label="Search" id="user_skill" placeholder="Skill" name="user_skill" maxlength = "25" style="font-size: .8em;
          font-weight: bold;" autocomplete="off">
        </div>
	      <button class="btn btn-light my-2 my-sm-0" type="submit" id="search_users">Search</button> &nbsp;
	      <button class="btn my-2 my-sm-0" type="submit" id="reset_users" name="reset">Reset Search</button>
      </form>
      <hr>
    </div>
  </div>

<script>
  function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}

        // x[currentFocus].classList.add("autocomplete-active");

        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }

        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        currentFocus = 0;
        addActive(x);
    });

    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });

  }

  /* skill array */
  var skills = new Array();
  <?php foreach($skill_array as $key => $val) { ?>
    skills.push('<?php echo $val; ?>');
    <?php } ?>

  /*initiate the autocomplete function on the "user_skill" element, and pass along the skills array as possible autocomplete values:*/
  autocomplete(document.getElementById("user_skill"), skills);


// Search button on enter keypress
  // Get the input field
  var input = document.getElementById("user_skill");

  // Execute a function when the user releases a key on the keyboard
  (document.getElementById("user_skill")).addEventListener("keyup", function(event) {
    // Number 13 is the "Enter" key on the keyboard
    if (event.keyCode === 13) {
      // Cancel the default action, if needed
      event.preventDefault();
      // Trigger the button element with a click
      document.getElementById("search_users").click();
    }
  });

</script>

<?php }
    #include('../../views/footer.php');
?>
