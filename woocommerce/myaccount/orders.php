<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$accLink = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
?>
<div class="account__section customer__section row">
    <div class="account__section--tab col-xs-12">
        <div class="container row justify-content-center nav nav-tabs" id="myTab">
            <div class="tab">
                <p class="c-detail text-uppercase"><a href="<?php echo $accLink ?>">Thông tin tài khoản</a></p>
            </div>
            <div class="tab active">
                <p class="c-detail text-uppercase"><a href="<?php echo $accLink . 'orders/' ?>">Lịch sử đơn hàng</a></p>
            </div>
        </div>
    </div>
    <div class="account__section--content customer__section--content tab-content col-xs-12">
        <div class="content__tab tab-pane fade active" id="profile">
            <p class="c-title title-history__cart">
                Lịch sử đơn hàng
            </p>
            <div class="container w-880">
                <table class="dashboard-order">
                    <tr class="row__title">
                        <th class="text-uppercase">Mã đơn hàng</th>
                        <th class="text-uppercase">Ngày đặt</th>
                        <th class="text-uppercase order-status-mb">Thanh toán</th>
                        <th class="text-uppercase order-status-mb">Tổng tiền</th>
                    </tr>
                    <?php if ( $has_orders ){
                        foreach ( $customer_orders->orders as $customer_order ){
                            $order      = wc_get_order( $customer_order );
                            $item_count = $order->get_item_count();
                    ?>
                    <tr>
                        <td>
                            <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                                <?php echo _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number(); ?>
                            </a>
                        </td>
                        <td>
                            <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>">
                                <?php echo esc_html( wc_format_datetime( $order->get_date_created(), 'd/m/Y' ) ); ?>
                            </time>
                        </td>
                        <td class="order-status status-complete order-status-mb">
                            <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></td>
                        <td class="order-status-mb"><?php echo $order->get_formatted_order_total() ?></td>
                    </tr>
                    <?php }}else{ ?>
                    <tr>
                        <td colspan="4">Hiện chưa có đơn hàng nào</td>
                    </tr>
                    <?php } ?>
                </table>
                <p class="text-align-center text-support">Nếu cần hỗ trợ về tình trạng đơn hàng, vui lòng gọi ngay
                    hotline: <a href="">070 666 9239</a></p>
            </div>
        </div>
    </div>
</div>