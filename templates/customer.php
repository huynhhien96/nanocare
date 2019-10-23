<?php /* Template Name: Customer */ ?>
<?php get_header(); ?>
<div class="account__section customer__section">
    <div class="account__section--tab">
        <div class="container row justify-content-center">
            <div class="tab active">
                <p class="c-detail text-uppercase">Thông tin tài khoản</p>
            </div>
            <div class="tab">
                <p class="c-detail text-uppercase">Lịch sử đơn hàng</p>
            </div>
        </div>
    </div>
    <div class="account__section--content customer__section--content">
        <div class="content__tab active">
            <p class="c-title">
                Thông tin tài khoản
            </p>
            <div class="container row justify-content-center">
                <div class="content__tab--left col-6">
                    <form class="form__custom row justify-content-end" action="">
                        <label class="text-uppercase" for="">
                            <p>Tên của bạn</p>
                            <input class="w-360 input-control" type="text" value="Nguyễn Thúy An" disabled>
                            <span class="edit-form">Sửa</span>
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Địa chỉ email</p>
                            <input class="w-360 input-control" type="text" placeholder="Địa chỉ email của bạn" value="ngthuyan14@gmail.com" disabled>
                            <span class="edit-form">Sửa</span>
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Mật khẩu</p>
                            <input class="w-360 input-control" type="password" value="123456" disabled>
                            <span class="edit-form">Sửa</span>
                        </label>
                    </form>
                </div>
                <div class="content__tab--right col-6">
                    <form class="form__custom" action="">
                        <label class="text-uppercase" for="">
                            <p>Điện thoại</p>
                            <input class="w-360 input-control" type="text" value="0908 707 8535" disabled>
                            <span class="edit-form">Sửa</span>
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Địa chỉ</p>
                            <input class="w-360 input-control" type="text" placeholder="Địa chỉ của bạn" value="472 Hai Bà Trưng" disabled>
                            <span class="edit-form">Sửa</span>
                        </label> <br>
                        <label class="text-uppercase" for="">
                            <p>Tỉnh/thành</p>
                            <input class="w-360 input-control" type="text" value="TP. Hồ Chí Minh" disabled>
                            <span class="edit-form">Sửa</span>
                        </label>
                        <label class="text-uppercase" for="">
                            <p>Phường/xã</p>
                            <input class="w-360 input-control" type="text" value="Tân Định" disabled>
                            <span class="edit-form">Sửa</span>
                        </label>
                    </form>
                </div>
            </div>
        </div>
        <div class="content__tab">
            <p class="c-title title-history__cart">
                Lịch sử đơn hàng
            </p>
            <div class="container w-880">
                <table class="dashboard-order">
                    <tr class="row__title">
                        <th class="text-uppercase">Mã đơn hàng</th>
                        <th class="text-uppercase">Ngày đặt</th>
                        <th class="text-uppercase">Thanh toán</th>
                        <th class="text-uppercase">Vận chuyển</th>
                        <th class="text-uppercase">Tổng tiền</th>
                    </tr>
                    <tr>
                        <td>#100362</td>
                        <td>14, tháng 2, 2019</td>
                        <td class="order-status status-complete">Hoàn tất</td>
                        <td class="order-status status-waiting">Đang chờ</td>
                        <td>280,000₫</td>
                    </tr>
                    <tr>
                        <td>#100362</td>
                        <td>14, tháng 2, 2019</td>
                        <td class="order-status status-complete">Hoàn tất</td>
                        <td class="order-status status-waiting">Đang chờ</td>
                        <td>280,000₫</td>
                    </tr>
                    <tr>
                        <td>#100362</td>
                        <td>14, tháng 2, 2019</td>
                        <td class="order-status status-cancel">Hủy</td>
                        <td class="order-status status-cancel">Hủy</td>
                        <td>280,000₫</td>
                    </tr>
                </table>
                <p class="text-align-center text-support">Nếu cần hỗ trợ về tình trạng đơn hàng, vui lòng gọi ngay hotline: <a href="">070 666 9239</a></p>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>