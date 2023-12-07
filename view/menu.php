<section class="home-slider owl-carousel">

	<div class="slider-item" style="background-image: url(/view/images/bg_3.jpg);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Menu</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang Chủ</a></span> <span>Menu</span></p>
				</div>

			</div>
		</div>
	</div>
</section>

<section class="ftco-intro">
  <div class="container-wrap">
    <div class="wrap d-md-flex align-items-xl-end">
      <div class="info">
        <div class="row no-gutters">
          <div class="col-md-4 d-flex ftco-animate">
            <div class="icon"><span class="icon-phone"></span></div>
            <div class="text">
              <h3>+84 934 789 999</h3>
              <p>
                Liên hệ Hotline để khiếu nại hoặc đóng góp ý kiến.
              </p>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="icon"><span class="icon-my_location"></span></div>
            <div class="text">
              <h3>Khu Dân Cư Hoàng Quân, Cái Răng, Cần Thơ</h3>
              <p>
                Đ. Số 22, Thường Thạnh, Cái Răng, Cần Thơ </p>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
            <div class="icon"><span class="icon-clock-o"></span></div>
            <div class="text">
              <h3>Mở Cửa Tất Cả Các Ngày Trong Tuần.</h3>
              <p>8:30am - 23:00pm</p>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="book p-4">
        <h3>Đặt Bàn</h3>
        <form action="#" class="appointment-form">
          <div class="d-md-flex">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Họ và Tên" />
            </div>
          </div>
          <div class="d-md-flex">
            <div class="form-group">
              <div class="input-wrap">
                <div class="icon">
                  <span class="ion-md-calendar"></span>
                </div>
                <input type="text" class="form-control appointment_date" placeholder="Ngày" />
              </div>
            </div>
            <div class="form-group ml-md-4">
              <div class="input-wrap">
                <div class="icon"><span class="ion-ios-clock"></span></div>
                <input type="text" class="form-control appointment_time" placeholder="Thời Gian" />
              </div>
            </div>
            <div class="form-group ml-md-4">
              <input type="text" class="form-control" placeholder="Số Điện Thoại" />
            </div>
          </div>
          <div class="d-md-flex">
            <div class="form-group">
              <textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Ghi Chú"></textarea>
            </div>
            <div class="form-group ml-md-4">
              <input type="submit" value="Đặt Hẹn" class="btn btn-white py-3 px-4" />
            </div>
          </div>
        </form>
      </div> -->
    </div>
  </div>
</section>

<section class="ftco-section">
	<div class="container">
		<div class="row">

			<h3 class="mb-5 heading-pricing ftco-animate">Sản phẩm nổi bật</h3>
			<?php
			$i = 0;
			foreach ($newproducts as $product) {
				extract($product);
				$productlink = "index.php?act=productdetail&id=" . $id;
				$img = 'admin/uploads/' . $img;

				echo '
		<div class="pricing-entry d-flex ftco-animate">
		<div class="img" style="background-image: url(' . $img . ');"></div>
		<div class="desc pl-2">
			<div class="d-flex text align-items-center">
				<h3 style="color:white"><span>' . $name . '</span></h3>
				<span class="price">' . number_format($price, 0, ',', '.') . '</span>
			</div>
			<div class="d-block">
				<p style="color:white">' . $detail . '</p>
			</div>
		</div>
	</div>
    
    ';
				$i += 1;
			}
			?>

		</div>
	</div>
</section>

<section class="ftco-menu mb-5 pb-5">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 heading-section text-center ftco-animate">
				<span class="subheading">Khám phá</span>
				<h2 class="mb-4">Sản phẩm của chúng tôi</h2>
			</div>
		</div>
		<div class="row d-md-flex">
			<div class="col-lg-12 ftco-animate p-md-5">
				<div class="row">
					<!-- <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Main Dish</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Drinks</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Desserts</a>
		            </div>
		          </div> -->
					<div class="col-md-12 d-flex align-items-center">

						<div class="tab-content ftco-animate">

							<div class="tab-pane fade show active" role="tabpanel" aria-labelledby="v-pills-1-tab">
								<div class="row">
									<?php
									$i = 0;
									foreach ($allproducts as $product) {
										extract($product);
										$productlink = "index.php?act=productdetail&id=" . $id;
										$img = 'admin/uploads/' . $img;

										echo '
										<div class="col-md-4 text-center">
										<div class="menu-wrap">
											<a href="'.$productlink.'" class="menu-img img mb-4" style="background-image: url( '.$img.');"></a>
											<div class="text">
												<h3><a href="'.$productlink.'">'.$name.'</a></h3>
												<p class="price"><span>'.number_format($price, 0, ',', '.').' VNĐ</span></p>
												<p><a href="'.$productlink.'" class="btn btn-primary btn-outline-primary">Xem chi tiết</a></p>
											</div>
										</div>
									</div>
    ';
										$i += 1;
									}
									?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>