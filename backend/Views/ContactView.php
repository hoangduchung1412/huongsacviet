<?php 
//load file layout vao day
self::$fileLayout = "LayoutView.php";
?>
<!-- CONTACT -->
<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<div class="middle" style="margin-top: 40px;">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.4166034561254!2d105.72902021437874!3d21.05601679222436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454571b911edf%3A0xa106d3b1c03d3aed!2zMTA2IFBo4buRIE5o4buVbiwgWHXDom4gUGjGsMahbmcsIFThu6sgTGnDqm0sIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1655527974702!5m2!1svi!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-7">
			<div class="form_blog_comment">
				<form>
					<h4>Liên hệ với chúng tôi</h4>
					<div class="form-group">
						<label>
							Họ và tên
							<span class="required">*</span>
						</label>
						<input id="name" name="contact[Name]" type="text" required="" value="" class="form-control">
					</div>
					<div class="form-group">
						<label>
							Địa chỉ email
							<span class="required">*</span>
						</label>
						<input id="email" name="contact[email]" class="form-control" required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$" type="email" value="">
					</div>
					<div class="form-group">
						<label>
							Viết bình luận
							<span class="required">*</span>
						</label>
						<textarea id="message" name="contact[Body]" style="height: 120px;" required="" class="form-control" rows="7"></textarea>
					</div>
					<div class="form-group">
						<button style="margin: 15px 0px;" type="submit" class="button_height_44">Gửi liên hệ</button>
					</div>
				</form>
			</div>
		</div>
		<div class="col-md-5">
			<h4 class="title_h4"></h4>
			<a class="logo" href="home">
				<img src="../assets/backend/img/logo-ngang.png" style="width: 400px;">
			</a>
			<p class="name_commpany"></p>
			<ul class="cnt_contact">
				<li>
					<i class="fas fa-location-dot"></i>
					<span>55 ngõ 102 Hoàng Đạo Thành - Kim Giang - Q. Thanh Xuân.</span>
				</li>
				<li>
					<i class="fas fa-mobile"></i>
					<span>0962.878.808 - 0982.757.667</span>
				</li>
				<li>
					<i class="fas fa-envelope"></i>
					<span>huongsacviet.com</span>
				</li>
			</ul>
		</div>
		<style type="text/css">
			span {
				font-size: 15px;
			}
		</style>
	</div>
</div>