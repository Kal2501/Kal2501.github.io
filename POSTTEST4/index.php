<?php
$products = [
  [
    "name" => "Sablon Setrika 3",
    "price" => 30000,
    "image" => "CAT.png",
  ],
  [
    "name" => "Kaos 30s Sablon A4",
    "price" => 75000,
    "image" => "a4.png",
  ],
  [
    "name" => "Kaos 30s Sablon A5",
    "price" => 50000,
    "image" => "A5.png",
  ],
  [
    "name" => "Paket Design Cetak",
    "price" => 30000,
    "image" => "design.png",
  ]
];
include "template/navbar.php";
?>
   <header id="header">
      <div>
        <h1>Lebih <i>Gampang</i></h1>
        <p>Mau sablon ga pake ribet? Order disini dengan paket-paket menarik dari SablonYUK!</p>
      </div>
      <img src="img/header.png" alt="" />
    </header>
    <section class="sell">
      <h1>
        What we sell?
      </h1>
      <div class="sell2">
        <div>
          <img src="img/2cc4ec38f8bb807210b97a171a61aeb6.jpg" alt="">
          <h2>
            Bahan Bagus
          </h2>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis, aut!
          </p>
        </div>
        <div>
          <img src="img/screen-printing-sablon-manual.jpg" alt="">
          <h2>
            Sablon Kuat
          </h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro, sed?
          </p>
        </div>
        <div>
          <img src="img/SEEK - Apa itu Customer Service_ Tugas, Gaji dan Skillnya - Image 1 (Header).jpg" alt="">
          <h2>
            Layanan Terbaik
          </h2>
          <p>
            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Totam, nam.
          </p>
        </div>
      </div>
    </section>
    <main id="catalog">
      <h1>Catalog</h1>
      <div class="catalog">
        <?php
        foreach ($products as $product) {
          
        ?>
        <div>
          <img
              src="img/<?= $product['image'] ?>"
              alt=""
            />
            <h2><?php
            echo $product['name'];
            ?></h2>
            <p>Rp<?php
            echo $product['price'];
            ?></p>
            <a href="form.php?name=<?=$product['name']?>&price=<?=$product['price']?>&image=<?=$product['image']?>">Details</a>
        </div>
        <?php
      }
        ?>
      </div>
    </main>
    <section id="about">
        <img src="img/1726361872870.png" alt="" />
        <div>
          <h2>About <i style="color: rgb(255, 77, 0)">Me</i></h2>
          <p>
            Kalingga Dwindra membangun website ini untuk menyediakan layanan
            jasa sablon yang dapat memudahkan masyarakat untuk berekspresi melalui pakaian dengan cara yang paling hemat, dan efisien.
          </p>
        </div>
    </section>
