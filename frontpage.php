
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Responsive Navbar with Search Box | CodingNepal</title>
    <link rel="stylesheet" href="frontpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>
    <nav>
      <div class="menu-icon"><span class="fas fa-bars"></span></div>
      
      <div class="nav-items">
        <li><a href="placeorder.php">Place Order</a></li>
        <li><a href="limits.php">Limits</a></li>
        <li><a href="holdings.php">Holdings</a></li>
        <li><a href="transaction_history.php">View Transactions</a></li>
        <li><a href="analyticaltools.php">Analytical tools</a></li>
      </div>
      <div class="search-icon"><span class="fas fa-search"></span></div>
      <div class="cancel-icon"><span class="fas fa-times"></span></div>
      <form action="quotes.php" method='POST'>
        <input type="search" class="search-data" name='search' placeholder="See Historic Data" required>
        <button type="submit" name='submit' class="fas fa-search"></button>
      </form>
    </nav>
    <div class="content">
      <header class="space">Get the best rates</header>
      <div class="space text">with ImperialBanking</div>
    </div>
    <script>
    const menuBtn = document.querySelector(".menu-icon span");
    const searchBtn = document.querySelector(".search-icon");
    const cancelBtn = document.querySelector(".cancel-icon");
    const items = document.querySelector(".nav-items");
    const form = document.querySelector("form");
    menuBtn.onclick = ()=>{
      items.classList.add("active");
      menuBtn.classList.add("hide");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
    cancelBtn.onclick = ()=>{
      items.classList.remove("active");
      menuBtn.classList.remove("hide");
      searchBtn.classList.remove("hide");
      cancelBtn.classList.remove("show");
      form.classList.remove("active");
      cancelBtn.style.color = "#ff3d00";
    }
    searchBtn.onclick = ()=>{
      form.classList.add("active");
      searchBtn.classList.add("hide");
      cancelBtn.classList.add("show");
    }
  </script>

  </body>
</html>
