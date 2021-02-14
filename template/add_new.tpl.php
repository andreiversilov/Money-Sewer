<div id="add_new">
  <form autocomplete="off" action="actions/add_transaction.php" method="post">
     <select size="2" class="select-css" id="type_tr" name="type">
      <option selected  onclick="show_categ()"value="income">➜ Income</option>
      <option id="expence" onclick="hide_categ()" value="expence">➜ Expence</option>
    </select>
    <p class="text">How much:</p> <input type="text" name="value"> 
    <p class="text"> Description: </p><input type="text" name="description">
    <p class="text"> Currency: </p><input type="text" name="currency" value="MDL">

     <p> 
      <p class="text category">Category:</p>
      <select size="4" class="select-css category" name="category">
    <option value="Grocery">Grocery</option>
    <option value="Bills">Bills</option>
    <option value="Shopping">Shopping</option>
    <option value="Transport">Transport</option>
   </select></p>
   <p>
    <input type="submit" class="text" id="sub" value="Ok">
  </form>
 <a href="http://localhost/money_sewer/?action=main" class="main_li" id="back">BACK</a>
</div>

<script type="text/javascript">
function hide_categ() {
  var x =  document.getElementsByClassName('category');
  x[0].style.display = "none";
  x[1].style.display = "none";
}
function show_categ() {
  var x = document.getElementsByClassName('category');
  x[0].style.display = "block";
  x[1].style.display = "block";
}
</script>
