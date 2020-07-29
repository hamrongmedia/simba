@extends('admin.layout')

@section('title')
  Quản lý User
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap-editable.css')}}">
@endsection

@section('main')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Order detail #300</h3>
                        <div class="box-tools not-print">
                            <div class="btn-group pull-right" style="margin-right: 0px">
                                <a href="https://demo.s-cart.org/sc_admin/order"
                                    class="btn btn-sm btn-flat btn-default"><i
                                        class="fa fa-list"></i>&nbsp;List</a>
                            </div>
                            <div class="btn-group pull-right" style="margin-right: 10px">
                                <a href="https://demo.s-cart.org/sc_admin/order/export_detail?order_id=300&amp;type=invoice"
                                    class="btn btn-sm btn-flat btn-twitter" title="Export"><i
                                        class="fa fa-file-excel-o"></i><span class="hidden-xs">
                                        Excel</span></a>
                            </div>

                            <div class="btn-group pull-right"
                                style="margin-right: 10px;border:1px solid #c5b5b5;">
                                <a class="btn btn-sm btn-flat" title="Export" onclick="order_print()"><i
                                        class="fa fa-print"></i><span class="hidden-xs"> Print</span></a>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="order-body">
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">First name:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="first_name"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="First name">Happi</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Last name:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="last_name"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Last name">Olivier</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Phone:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="phone"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Phone">0680415442</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Email:</td>
                                    <td>zamahappi@gmail.com</td>
                                </tr>



                                <tr>
                                    <td class="td-title">Address 1:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="address1"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Address 1">Immeuble Kadji Akwa Doual</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Address 2:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="address2"
                                            data-type="text" data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Address 2">frfr</a></td>
                                </tr>

                                <tr>
                                    <td class="td-title">Country:</td>
                                    <td><a href="#" class="updateInfoRequired" data-name="country"
                                            data-type="select"
                                            data-source="{&quot;AL&quot;:&quot;Albania&quot;,&quot;DZ&quot;:&quot;Algeria&quot;,&quot;DS&quot;:&quot;American Samoa&quot;,&quot;AD&quot;:&quot;Andorra&quot;,&quot;AO&quot;:&quot;Angola&quot;,&quot;AI&quot;:&quot;Anguilla&quot;,&quot;AQ&quot;:&quot;Antarctica&quot;,&quot;AG&quot;:&quot;Antigua and Barbuda&quot;,&quot;AR&quot;:&quot;Argentina&quot;,&quot;AM&quot;:&quot;Armenia&quot;,&quot;AW&quot;:&quot;Aruba&quot;,&quot;AU&quot;:&quot;Australia&quot;,&quot;AT&quot;:&quot;Austria&quot;,&quot;AZ&quot;:&quot;Azerbaijan&quot;,&quot;BS&quot;:&quot;Bahamas&quot;,&quot;BH&quot;:&quot;Bahrain&quot;,&quot;BD&quot;:&quot;Bangladesh&quot;,&quot;BB&quot;:&quot;Barbados&quot;,&quot;BY&quot;:&quot;Belarus&quot;,&quot;BE&quot;:&quot;Belgium&quot;,&quot;BZ&quot;:&quot;Belize&quot;,&quot;BJ&quot;:&quot;Benin&quot;,&quot;BM&quot;:&quot;Bermuda&quot;,&quot;BT&quot;:&quot;Bhutan&quot;,&quot;BO&quot;:&quot;Bolivia&quot;,&quot;BA&quot;:&quot;Bosnia and Herzegovina&quot;,&quot;BW&quot;:&quot;Botswana&quot;,&quot;BV&quot;:&quot;Bouvet Island&quot;,&quot;BR&quot;:&quot;Brazil&quot;,&quot;IO&quot;:&quot;British Indian Ocean Territory&quot;,&quot;BN&quot;:&quot;Brunei Darussalam&quot;,&quot;BG&quot;:&quot;Bulgaria&quot;,&quot;BF&quot;:&quot;Burkina Faso&quot;,&quot;BI&quot;:&quot;Burundi&quot;,&quot;KH&quot;:&quot;Cambodia&quot;,&quot;CM&quot;:&quot;Cameroon&quot;,&quot;CA&quot;:&quot;Canada&quot;,&quot;CV&quot;:&quot;Cape Verde&quot;,&quot;KY&quot;:&quot;Cayman Islands&quot;,&quot;CF&quot;:&quot;Central African Republic&quot;,&quot;TD&quot;:&quot;Chad&quot;,&quot;CL&quot;:&quot;Chile&quot;,&quot;CN&quot;:&quot;China&quot;,&quot;CX&quot;:&quot;Christmas Island&quot;,&quot;CC&quot;:&quot;Cocos (Keeling) Islands&quot;,&quot;CO&quot;:&quot;Colombia&quot;,&quot;KM&quot;:&quot;Comoros&quot;,&quot;CG&quot;:&quot;Congo&quot;,&quot;CK&quot;:&quot;Cook Islands&quot;,&quot;CR&quot;:&quot;Costa Rica&quot;,&quot;HR&quot;:&quot;Croatia (Hrvatska)&quot;,&quot;CU&quot;:&quot;Cuba&quot;,&quot;CY&quot;:&quot;Cyprus&quot;,&quot;CZ&quot;:&quot;Czech Republic&quot;,&quot;DK&quot;:&quot;Denmark&quot;,&quot;DJ&quot;:&quot;Djibouti&quot;,&quot;DM&quot;:&quot;Dominica&quot;,&quot;DO&quot;:&quot;Dominican Republic&quot;,&quot;TP&quot;:&quot;East Timor&quot;,&quot;EC&quot;:&quot;Ecuador&quot;,&quot;EG&quot;:&quot;Egypt&quot;,&quot;SV&quot;:&quot;El Salvador&quot;,&quot;GQ&quot;:&quot;Equatorial Guinea&quot;,&quot;ER&quot;:&quot;Eritrea&quot;,&quot;EE&quot;:&quot;Estonia&quot;,&quot;ET&quot;:&quot;Ethiopia&quot;,&quot;FK&quot;:&quot;Falkland Islands (Malvinas)&quot;,&quot;FO&quot;:&quot;Faroe Islands&quot;,&quot;FJ&quot;:&quot;Fiji&quot;,&quot;FI&quot;:&quot;Finland&quot;,&quot;FR&quot;:&quot;France&quot;,&quot;FX&quot;:&quot;France, Metropolitan&quot;,&quot;GF&quot;:&quot;French Guiana&quot;,&quot;PF&quot;:&quot;French Polynesia&quot;,&quot;TF&quot;:&quot;French Southern Territories&quot;,&quot;GA&quot;:&quot;Gabon&quot;,&quot;GM&quot;:&quot;Gambia&quot;,&quot;GE&quot;:&quot;Georgia&quot;,&quot;DE&quot;:&quot;Germany&quot;,&quot;GH&quot;:&quot;Ghana&quot;,&quot;GI&quot;:&quot;Gibraltar&quot;,&quot;GK&quot;:&quot;Guernsey&quot;,&quot;GR&quot;:&quot;Greece&quot;,&quot;GL&quot;:&quot;Greenland&quot;,&quot;GD&quot;:&quot;Grenada&quot;,&quot;GP&quot;:&quot;Guadeloupe&quot;,&quot;GU&quot;:&quot;Guam&quot;,&quot;GT&quot;:&quot;Guatemala&quot;,&quot;GN&quot;:&quot;Guinea&quot;,&quot;GW&quot;:&quot;Guinea-Bissau&quot;,&quot;GY&quot;:&quot;Guyana&quot;,&quot;HT&quot;:&quot;Haiti&quot;,&quot;HM&quot;:&quot;Heard and Mc Donald Islands&quot;,&quot;HN&quot;:&quot;Honduras&quot;,&quot;HK&quot;:&quot;Hong Kong&quot;,&quot;HU&quot;:&quot;Hungary&quot;,&quot;IS&quot;:&quot;Iceland&quot;,&quot;IN&quot;:&quot;India&quot;,&quot;IM&quot;:&quot;Isle of Man&quot;,&quot;ID&quot;:&quot;Indonesia&quot;,&quot;IR&quot;:&quot;Iran (Islamic Republic of)&quot;,&quot;IQ&quot;:&quot;Iraq&quot;,&quot;IE&quot;:&quot;Ireland&quot;,&quot;IL&quot;:&quot;Israel&quot;,&quot;IT&quot;:&quot;Italy&quot;,&quot;CI&quot;:&quot;Ivory Coast&quot;,&quot;JE&quot;:&quot;Jersey&quot;,&quot;JM&quot;:&quot;Jamaica&quot;,&quot;JP&quot;:&quot;Japan&quot;,&quot;JO&quot;:&quot;Jordan&quot;,&quot;KZ&quot;:&quot;Kazakhstan&quot;,&quot;KE&quot;:&quot;Kenya&quot;,&quot;KI&quot;:&quot;Kiribati&quot;,&quot;KP&quot;:&quot;Korea,Democratic People&#039;s Republic of&quot;,&quot;KR&quot;:&quot;Korea, Republic of&quot;,&quot;XK&quot;:&quot;Kosovo&quot;,&quot;KW&quot;:&quot;Kuwait&quot;,&quot;KG&quot;:&quot;Kyrgyzstan&quot;,&quot;LA&quot;:&quot;Lao People&#039;s Democratic Republic&quot;,&quot;LV&quot;:&quot;Latvia&quot;,&quot;LB&quot;:&quot;Lebanon&quot;,&quot;LS&quot;:&quot;Lesotho&quot;,&quot;LR&quot;:&quot;Liberia&quot;,&quot;LY&quot;:&quot;Libyan Arab Jamahiriya&quot;,&quot;LI&quot;:&quot;Liechtenstein&quot;,&quot;LT&quot;:&quot;Lithuania&quot;,&quot;LU&quot;:&quot;Luxembourg&quot;,&quot;MO&quot;:&quot;Macau&quot;,&quot;MK&quot;:&quot;Macedonia&quot;,&quot;MG&quot;:&quot;Madagascar&quot;,&quot;MW&quot;:&quot;Malawi&quot;,&quot;MY&quot;:&quot;Malaysia&quot;,&quot;MV&quot;:&quot;Maldives&quot;,&quot;ML&quot;:&quot;Mali&quot;,&quot;MT&quot;:&quot;Malta&quot;,&quot;MH&quot;:&quot;Marshall Islands&quot;,&quot;MQ&quot;:&quot;Martinique&quot;,&quot;MR&quot;:&quot;Mauritania&quot;,&quot;MU&quot;:&quot;Mauritius&quot;,&quot;TY&quot;:&quot;Mayotte&quot;,&quot;MX&quot;:&quot;Mexico&quot;,&quot;FM&quot;:&quot;Micronesia, Federated States of&quot;,&quot;MD&quot;:&quot;Moldova, Republic of&quot;,&quot;MC&quot;:&quot;Monaco&quot;,&quot;MN&quot;:&quot;Mongolia&quot;,&quot;ME&quot;:&quot;Montenegro&quot;,&quot;MS&quot;:&quot;Montserrat&quot;,&quot;MA&quot;:&quot;Morocco&quot;,&quot;MZ&quot;:&quot;Mozambique&quot;,&quot;MM&quot;:&quot;Myanmar&quot;,&quot;NA&quot;:&quot;Namibia&quot;,&quot;NR&quot;:&quot;Nauru&quot;,&quot;NP&quot;:&quot;Nepal&quot;,&quot;NL&quot;:&quot;Netherlands&quot;,&quot;AN&quot;:&quot;Netherlands Antilles&quot;,&quot;NC&quot;:&quot;New Caledonia&quot;,&quot;NZ&quot;:&quot;New Zealand&quot;,&quot;NI&quot;:&quot;Nicaragua&quot;,&quot;NE&quot;:&quot;Niger&quot;,&quot;NG&quot;:&quot;Nigeria&quot;,&quot;NU&quot;:&quot;Niue&quot;,&quot;NF&quot;:&quot;Norfolk Island&quot;,&quot;MP&quot;:&quot;Northern Mariana Islands&quot;,&quot;NO&quot;:&quot;Norway&quot;,&quot;OM&quot;:&quot;Oman&quot;,&quot;PK&quot;:&quot;Pakistan&quot;,&quot;PW&quot;:&quot;Palau&quot;,&quot;PS&quot;:&quot;Palestine&quot;,&quot;PA&quot;:&quot;Panama&quot;,&quot;PG&quot;:&quot;Papua New Guinea&quot;,&quot;PY&quot;:&quot;Paraguay&quot;,&quot;PE&quot;:&quot;Peru&quot;,&quot;PH&quot;:&quot;Philippines&quot;,&quot;PN&quot;:&quot;Pitcairn&quot;,&quot;PL&quot;:&quot;Poland&quot;,&quot;PT&quot;:&quot;Portugal&quot;,&quot;PR&quot;:&quot;Puerto Rico&quot;,&quot;QA&quot;:&quot;Qatar&quot;,&quot;RE&quot;:&quot;Reunion&quot;,&quot;RO&quot;:&quot;Romania&quot;,&quot;RU&quot;:&quot;Russian Federation&quot;,&quot;RW&quot;:&quot;Rwanda&quot;,&quot;KN&quot;:&quot;Saint Kitts and Nevis&quot;,&quot;LC&quot;:&quot;Saint Lucia&quot;,&quot;VC&quot;:&quot;Saint Vincent and the Grenadines&quot;,&quot;WS&quot;:&quot;Samoa&quot;,&quot;SM&quot;:&quot;San Marino&quot;,&quot;ST&quot;:&quot;Sao Tome and Principe&quot;,&quot;SA&quot;:&quot;Saudi Arabia&quot;,&quot;SN&quot;:&quot;Senegal&quot;,&quot;RS&quot;:&quot;Serbia&quot;,&quot;SC&quot;:&quot;Seychelles&quot;,&quot;SL&quot;:&quot;Sierra Leone&quot;,&quot;SG&quot;:&quot;Singapore&quot;,&quot;SK&quot;:&quot;Slovakia&quot;,&quot;SI&quot;:&quot;Slovenia&quot;,&quot;SB&quot;:&quot;Solomon Islands&quot;,&quot;SO&quot;:&quot;Somalia&quot;,&quot;ZA&quot;:&quot;South Africa&quot;,&quot;GS&quot;:&quot;South Georgia South Sandwich Islands&quot;,&quot;SS&quot;:&quot;South Sudan&quot;,&quot;ES&quot;:&quot;Spain&quot;,&quot;LK&quot;:&quot;Sri Lanka&quot;,&quot;SH&quot;:&quot;St. Helena&quot;,&quot;PM&quot;:&quot;St. Pierre and Miquelon&quot;,&quot;SD&quot;:&quot;Sudan&quot;,&quot;SR&quot;:&quot;Suriname&quot;,&quot;SJ&quot;:&quot;Svalbard and Jan Mayen Islands&quot;,&quot;SZ&quot;:&quot;Swaziland&quot;,&quot;SE&quot;:&quot;Sweden&quot;,&quot;CH&quot;:&quot;Switzerland&quot;,&quot;SY&quot;:&quot;Syrian Arab Republic&quot;,&quot;TW&quot;:&quot;Taiwan&quot;,&quot;TJ&quot;:&quot;Tajikistan&quot;,&quot;TZ&quot;:&quot;Tanzania, United Republic of&quot;,&quot;TH&quot;:&quot;Thailand&quot;,&quot;TG&quot;:&quot;Togo&quot;,&quot;TK&quot;:&quot;Tokelau&quot;,&quot;TO&quot;:&quot;Tonga&quot;,&quot;TT&quot;:&quot;Trinidad and Tobago&quot;,&quot;TN&quot;:&quot;Tunisia&quot;,&quot;TR&quot;:&quot;Turkey&quot;,&quot;TM&quot;:&quot;Turkmenistan&quot;,&quot;TC&quot;:&quot;Turks and Caicos Islands&quot;,&quot;TV&quot;:&quot;Tuvalu&quot;,&quot;UG&quot;:&quot;Uganda&quot;,&quot;UA&quot;:&quot;Ukraine&quot;,&quot;AE&quot;:&quot;United Arab Emirates&quot;,&quot;GB&quot;:&quot;United Kingdom&quot;,&quot;US&quot;:&quot;United States&quot;,&quot;UM&quot;:&quot;United States minor outlying islands&quot;,&quot;UY&quot;:&quot;Uruguay&quot;,&quot;UZ&quot;:&quot;Uzbekistan&quot;,&quot;VU&quot;:&quot;Vanuatu&quot;,&quot;VA&quot;:&quot;Vatican City State&quot;,&quot;VE&quot;:&quot;Venezuela&quot;,&quot;VN&quot;:&quot;Vietnam&quot;,&quot;VG&quot;:&quot;Virgin Islands (British)&quot;,&quot;VI&quot;:&quot;Virgin Islands (U.S.)&quot;,&quot;WF&quot;:&quot;Wallis and Futuna Islands&quot;,&quot;EH&quot;:&quot;Western Sahara&quot;,&quot;YE&quot;:&quot;Yemen&quot;,&quot;ZR&quot;:&quot;Zaire&quot;,&quot;ZM&quot;:&quot;Zambia&quot;,&quot;ZW&quot;:&quot;Zimbabwe&quot;}"
                                            data-pk="300"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Country" data-value="CM"></a></td>
                                </tr>

                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Order status:</td>
                                    <td><a href="#" class="updateStatus" data-name="status" data-type="select"
                                            data-source="{&quot;1&quot;:&quot;New&quot;,&quot;2&quot;:&quot;Processing&quot;,&quot;3&quot;:&quot;Hold&quot;,&quot;4&quot;:&quot;Canceled&quot;,&quot;5&quot;:&quot;Done&quot;,&quot;6&quot;:&quot;Failed&quot;}"
                                            data-pk="300" data-value="1"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Order status">New</a></td>
                                </tr>
                                <tr>
                                    <td>Shipping status:</td>
                                    <td><a href="#" class="updateStatus" data-name="shipping_status"
                                            data-type="select"
                                            data-source="{&quot;1&quot;:&quot;Not sent&quot;,&quot;2&quot;:&quot;Sending&quot;,&quot;3&quot;:&quot;Shipping done&quot;}"
                                            data-pk="300" data-value="1"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Shipping status">Not sent</a></td>
                                </tr>
                                <tr>
                                    <td>Payment status:</td>
                                    <td><a href="#" class="updateStatus" data-name="payment_status"
                                            data-type="select"
                                            data-source="{&quot;1&quot;:&quot;Unpaid&quot;,&quot;2&quot;:&quot;Partial payment&quot;,&quot;3&quot;:&quot;Paid&quot;,&quot;4&quot;:&quot;Refurn&quot;}"
                                            data-pk="300" data-value="1"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Payment status">Unpaid</a></td>
                                </tr>
                                <tr>
                                    <td>Shipping method:</td>
                                    <td><a href="#" class="updateStatus" data-name="shipping_method"
                                            data-type="select"
                                            data-source="{&quot;ShippingStandard&quot;:&quot;Shipping Standard&quot;}"
                                            data-pk="300" data-value="ShippingStandard"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Shipping method">ShippingStandard</a></td>
                                </tr>
                                <tr>
                                    <td>Payment method:</td>
                                    <td><a href="#" class="updateStatus" data-name="payment_method"
                                            data-type="select"
                                            data-source="{&quot;Paypal&quot;:&quot;Paypal&quot;,&quot;Cash&quot;:&quot;Cash on delivery&quot;,&quot;VnpayBasic&quot;:&quot;VnpayBasic&quot;,&quot;MomoBasic&quot;:&quot;MOMO payment basic&quot;}"
                                            data-pk="300" data-value="VnpayBasic"
                                            data-url="{{route('admin.order.update')}}"
                                            data-title="Payment method">VnpayBasic</a></td>
                                </tr>
                            </table>
                            <table class="table table-bordered">
                                <tr>
                                    <td class="td-title">Currency:</td>
                                    <td>USD</td>
                                </tr>
                                <tr>
                                    <td class="td-title">Exchange rate:</td>
                                    <td>1</td>
                                </tr>
                            </table>
                        </div>

                    </div>


                    <form id="form-add-item" action="" method="">
                        <input type="hidden" name="_token" value="foBMOeniEJ52saPQBN2IkKdhQHw74SYV3lyxqF20">
                        <input type="hidden" name="order_id" value="300">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="box collapsed-box">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>SKU</th>
                                                    <th class="product_price">Price</th>
                                                    <th class="product_qty">Quantity</th>
                                                    <th class="product_total">Total</th>
                                                    <th class="product_tax">Tax</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Easy Polo Black Edition 13

                                                    </td>
                                                    <td>3D-GOLD1.75</td>
                                                    <td class="product_price"><a href="#"
                                                            class="edit-item-detail" data-value="4000"
                                                            data-name="price" data-type="number" min=0
                                                            data-pk="376"
                                                            data-url="https://demo.s-cart.org/sc_admin/order/edit_item"
                                                            data-title="Price">4000</a></td>
                                                    <td class="product_qty">x <a href="#"
                                                            class="edit-item-detail" data-value="1"
                                                            data-name="qty" data-type="number" min=0
                                                            data-pk="376"
                                                            data-url="https://demo.s-cart.org/sc_admin/order/edit_item"
                                                            data-title="Quantity"> 1</a></td>
                                                    <td class="product_total item_id_376">$4,000</td>
                                                    <td class="product_tax"><a href="#" class="edit-item-detail"
                                                            data-value="400" data-name="tax" data-type="number"
                                                            min=0 data-pk="376"
                                                            data-url="https://demo.s-cart.org/sc_admin/order/edit_item"
                                                            data-title="order.tax"> 400</a></td>
                                                    <td>
                                                        <span onclick="deleteItem(376);"
                                                            class="btn btn-danger btn-xs" data-title="Delete"><i
                                                                class="fa fa-trash"
                                                                aria-hidden="true"></i></span>
                                                    </td>
                                                </tr>

                                                <tr id="add-item" class="not-print">
                                                    <td colspan="6">
                                                        <button type="button"
                                                            class="btn btn-sm btn-flat btn-success"
                                                            id="add-item-button" title="Add product"><i
                                                                class="fa fa-plus"></i> Add product</button>
                                                        &nbsp;&nbsp;&nbsp;<button
                                                            style="display: none; margin-right: 50px"
                                                            type="button"
                                                            class="btn btn-sm btn-flat btn-warning"
                                                            id="add-item-button-save" title="Save"><i
                                                                class="fa fa-save"></i> Save</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="box collapsed-box">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="td-title-normal">Sub Total:</td>
                                        <td style="text-align:right" class="data-subtotal">4,000</td>
                                    </tr>




                                    <tr>
                                        <td class="td-title-normal">Tax:</td>
                                        <td style="text-align:right" class="data-tax">400</td>
                                    </tr>





                                    <tr>
                                        <td>Shipping Standard:</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-shipping" data-name="shipping"
                                                data-type="text" data-pk="1738"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="Shipping price">20000</a></td>
                                    </tr>




                                    <tr>
                                        <td>Discount(-):</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-discount" data-name="discount"
                                                data-type="text" data-pk="1739"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="Discount">0</a></td>
                                    </tr>
                                    <tr style="background:#f5f3f3;font-weight: bold;">
                                        <td>Total:</td>
                                        <td style="text-align:right" class="data-total">24,400</td>
                                    </tr>
                                    <tr>
                                        <td>Received(-):</td>
                                        <td style="text-align:right"><a href="#"
                                                class="updatePrice data-received" data-name="received"
                                                data-type="text" data-pk="1741"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="Received">0</a></td>
                                    </tr>
                                    <tr style="font-weight:bold;" class="data-balance">
                                        <td>Balance:</td>
                                        <td style="text-align:right">24,400</td>
                                    </tr>
                                </table>
                            </div>

                        </div>



                        <div class="col-sm-6">
                            <div class="box collapsed-box">
                                <table class="table box table-bordered">
                                    <tr>
                                        <td class="td-title">Order note:</td>
                                        <td>
                                            <a href="#" class="updateInfo" data-name="comment" data-type="text"
                                                data-pk="300"
                                                data-url="{{route('admin.order.update')}}"
                                                data-title="">
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="box collapsed-box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Order history</h3>

                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="box-body table-responsive no-padding box-primary">
                                    <table class="table table-bordered" id="history">
                                        <tr>
                                            <th>Staff</th>
                                            <th>Content</th>
                                            <th>Time</th>
                                        </tr>
                                        <tr>
                                            <td>Test</td>
                                            <td>
                                                <div class="history">New order</div>
                                            </td>
                                            <td>2020-07-27 18:48:12</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('js')
<script src="{{asset('js/bootstrap-editable.min.js')}}"></script>
<script>
    
    function deleteItem(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        })
            .then((result) => {
                if (result.value) {
                    deleteAjax(id);
                }
            })
    }

    function multipleDelete() {
        let idList = [];
        console.log(document.querySelectorAll('.table-checkbox'));
        let input = document.querySelectorAll('.table-checkbox:checked').forEach(function (item) {
            idList.push(item.getAttribute('data-id'));
        })

        if (idList.length > 0) {
            console.log(idList)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    idList.forEach(function (id) {
                        deleteAjax(id);
                    })
                }
            })
        }
    }
</script>


<script type="text/javascript">

    $(document).ready(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });

    function update_total(e) {
        node = e.closest('tr');
        var qty = node.find('.add_qty').eq(0).val();
        var price = node.find('.add_price').eq(0).val();
        node.find('.add_total').eq(0).val(qty * price);
    }


    //Add item
    function selectProduct(element) {
        node = element.closest('tr');
        var id = parseInt(node.find('option:selected').eq(0).val());
        if (id == 0) {
            node.find('.add_sku').val('');
            node.find('.add_qty').eq(0).val('');
            node.find('.add_price').eq(0).val('');
            node.find('.add_attr').html('');
            node.find('.add_tax').html('');
        } else {
            $.ajax({
                url: 'https://demo.s-cart.org/sc_admin/order/product_info',
                type: "get",
                dateType: "application/json; charset=utf-8",
                data: {
                    id: id,
                    order_id: 300,
                },
                beforeSend: function () {
                    $('#loading').show();
                },
                success: function (returnedData) {
                    node.find('.add_sku').val(returnedData.sku);
                    node.find('.add_qty').eq(0).val(1);
                    node.find('.add_price').eq(0).val(returnedData.price_final * 1);
                    node.find('.add_total').eq(0).val(returnedData.price_final * 1);
                    node.find('.add_attr').eq(0).html(returnedData.renderAttDetails);
                    node.find('.add_tax').eq(0).html(returnedData.tax);
                    $('#loading').hide();
                }
            });
        }

    }

    $('#add-item-button-save').click(function (event) {
        $('#add-item-button').prop('disabled', true);
        $('#add-item-button-save').button('loading');
        $.ajax({
            url: 'https://demo.s-cart.org/sc_admin/order/add_item',
            type: 'post',
            dataType: 'json',
            data: $('form#form-add-item').serialize(),
            beforeSend: function () {
                $('#loading').show();
            },
            success: function (result) {
                $('#loading').hide();
                if (parseInt(result.error) == 0) {
                    location.reload();
                } else {
                    alertJs('error', result.msg);
                }
            }
        });
    });

    //End add item
    //

    $(document).ready(function () {
        all_editable();
    });

    function all_editable() {
        $.fn.editable.defaults.params = function (params) {
            params._token = {{csrf_token()}};
            return params;
        };

        $('.updateInfo').editable({
            success: function (response) {
                if (response.error == 0) {
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }
        });

        $(".updatePrice").on("shown", function (e, editable) {
            var value = $(this).text().replace(/,/g, "");
            editable.input.$input.val(parseInt(value));
        });

        $('.updateStatus').editable({
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
            },
            success: function (response) {
                if (response.error == 0) {
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }
        });

        $('.updateInfoRequired').editable({
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
            },
            success: function (response, newValue) {
                console.log(response.msg);
                if (response.error == 0) {
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }
        });


        $('.edit-item-detail').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
                if (!$.isNumeric(value)) {
                    return 'Please input numeric!';
                }
            },
            success: function (response, newValue) {
                if (response.error == 0) {
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-received').html(response.detail.received);
                    $('.data-subtotal').html(response.detail.subtotal);
                    $('.data-tax').html(response.detail.tax);
                    $('.data-total').html(response.detail.total);
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-discount').html(response.detail.discount);
                    $('.item_id_' + response.detail.item_id).html(response.detail.item_total_price);
                    var objblance = $('.data-balance').eq(0);
                    objblance.before(response.detail.balance);
                    objblance.remove();
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }

        });

        $('.updatePrice').editable({
            ajaxOptions: {
                type: 'post',
                dataType: 'json'
            },
            validate: function (value) {
                if (value == '') {
                    return 'Data not empty!';
                }
                if (!$.isNumeric(value)) {
                    return 'Please input numeric!';
                }
            },

            success: function (response, newValue) {
                if (response.error == 0) {
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-received').html(response.detail.received);
                    $('.data-subtotal').html(response.detail.subtotal);
                    $('.data-tax').html(response.detail.tax);
                    $('.data-total').html(response.detail.total);
                    $('.data-shipping').html(response.detail.shipping);
                    $('.data-discount').html(response.detail.discount);
                    var objblance = $('.data-balance').eq(0);
                    objblance.before(response.detail.balance);
                    objblance.remove();
                    alertJs('success', response.msg);
                } else {
                    alertJs('error', response.msg);
                }
            }
        });
    }



    function deleteItem(id) {
        Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: true,
        }).fire({
            title: 'Are you sure to delete this item?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            confirmButtonColor: "#DD6B55",
            cancelButtonText: 'No, cancel!',
            reverseButtons: true,

            preConfirm: function () {
                return new Promise(function (resolve) {
                    $.ajax({
                        method: 'POST',
                        url: 'https://demo.s-cart.org/sc_admin/order/delete_item',
                        data: {
                            'pId': id,
                            _token: 'foBMOeniEJ52saPQBN2IkKdhQHw74SYV3lyxqF20',
                        },
                        success: function (response) {
                            if (response.error == 0) {
                                location.reload();
                                alertJs('success', response.msg);
                            } else {
                                alertJs('error', response.msg);
                            }

                        }
                    });
                });
            }

        }).then((result) => {
            if (result.value) {
                alertMsg('success', 'Item has been deleted.', 'Deleted!');
            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                // swalWithBootstrapButtons.fire(
                //   'Cancelled',
                //   'Your imaginary file is safe :)',
                //   'error'
                // )
            }
        })
    }



    $(document).ready(function () {
        // does current browser support PJAX
        if ($.support.pjax) {
            $.pjax.defaults.timeout = 2000; // time in milliseconds
        }

    });

    function order_print() {
        $('.not-print').hide();
        window.print();
        $('.not-print').show();
    }
</script>
@endsection