<section id="center">
  <?php if (isset($_COOKIE['user'])): ?>
    <a id="new_one" href="http://localhost/money_sewer/?action=add_new"> ADD NEW NOTE</a>
    <?php else: ?>
    <a id="new_one" href="http://localhost/money_sewer/?action=auth"> ADD NEW NOTE</a>
  <?php endif; ?>
    <ul type="none">
      <li class="main_li">Current month expence: 128767.9 $</li>
      <li class="main_li">Current month income: 123551.9 $</li>
    </ul>
</section>