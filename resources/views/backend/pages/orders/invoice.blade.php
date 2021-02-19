<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice-{{$order->id}}</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <Style>
        .content-wrapper{
            background: #FFF;
        }

        .invoice-header{
            background: #f7f7f7;
            padding: 10px 20px 10px 20px;
            
        }
        
        .invoice-right-top h3{
            padding-right: 20px;
            margin-top: 20px;
            color: #ec5d01;
            font-size: 55px!important;
            font-family: serif;
        }

        .invoice-left-top{
            border-left: 4px solid #ec5d00;
            padding-left: 20px;
            padding-top: 20px;
        }

        .thead{
            background: #ec5d01;
            color: #FFF;
        }

        .authority h5{
            margin-top: -10px;
            color: #ec5d01;
        }

        .thanks h4{
            color: #ec5d01;
            font-size: 25px;
            font-weight: normal;
            font-family: serif;
            margin-top: 20px;
        }

        .site-address p{
            line-height: 6px;
            font-weight: 300;
        }
    </Style>
</head>
<body>
    
    <div class="content-wrapper">
            <div class="invoice-header">
                <div class="float-left site-logo" style="float: left;">
                    <img src="{{asset('images/favicon.png')}}" width="100px;">
                   
                </div>
                <div class="float-right site-address" style="float: right;">
                    <h4>Lara Ecommerce</h4>
                    <p>31/1, Purana Paltan, Dhaka-1200</p>
                    <p>Phone: <a href="">01724938906</a></p>
                    <p>Email: <a href="milto:info@Laraecommerce.com">info@Laraecomerce.com</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
            <br><br><br><br><br><br><br>
            <div class="invoice-description" style="border-top: 2px solid gray;">
                <div class="invoice-left-top float-left" style="float: left;">
                    <h6>Invoice to</h6>
                    <h3>{{$order->name}}</h3>
                    <div class="address">
                        <p>
                            <p>Phone: {{$order->phone_no}}</p>
                            <p>Email: <a href="mailto:{{$order->email}}">{{$order->email}}</a></p>
                        </p>
                </div>
            </div>
                <div class="invoice-right-top float-right" style="float: right;">
                    <h1 style="color: #ec5d01;">Invoice #{{$order->id}}</h1>
                    <p>{{$order->created_at}}</p>
                    </div>
                    <div class="clearfix"></div> 
            </div>
            <br><br><br><br><br><br><br><br><br><br><br><br>
          

              <h3>Product</h3>
              
              @if($order->carts->count()>0)
              <table class="table table-border table-stripe">
                  <thead style="background: #ec5d01; color: #FFF;">
                      <tr>
                          <th>No.</th>
                          <th>Product Title</th>
                          <th>Product Quantity</th>
                          <th>Unit Price</th>
                          <th>Sub Total Price</th>
                       </tr>
                  </thead>
                  <tbody>
                      @php
                          $total_price=0;
                      @endphp
                      @foreach ($order->carts as $cart)
                          
                      <tr>
                          <td>{{$loop->index + 1}}</td>
                          <td>
                              <a href="{{route('products.show', $cart->product->slug)}}">{{$cart->product->title}}
                              </td>
                          <td>
                              {{$cart->product_quantity}}
                          </td>
                          <td>
                              {{$cart->product->price}} Taka
                          </td>
                          <td>
                              @php
                                  $total_price+=$cart->product->price*$cart->product_quantity;
                              @endphp
                              {{$cart->product->price * $cart->product_quantity}} Taka               
                          </td>
                          
                              
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="3"></td>
                        <td>Discount</td>
                        <td colspan="2"><strong>{{$order->custom_discount}} Taka</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>Shipping Cost</td>
                        <td colspan="2"><strong>{{$order->shipping_charge}} Taka</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>Total Amount:</td>
                        <td colspan="2">{{$total_price + $order->shipping_charge - $order->custom_discount}} Taka</td>
                    </tr>
          
                      <tr>
                          <td colspan="3"></td>
                          <td>Total Amount:</td>
                          <td colspan="2">{{$total_price}} Taka</td>
                      </tr>
          
                  </tbody>
          @endif
    
          
              </table>
              <br><br><br><br><br><br><br><br><br><br>

              <div class="thanks mt-3">
                  <h4>Thank you for your business !!</h4>
              </div>

              <div class="authority float-right mt-5">
                  <p>---------------------------</p>
                  <h5>Authority Signature:</h5>
              </div>
              <div class="clearfix"></div>
              
        
      </div>
        
  
    
</body>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>