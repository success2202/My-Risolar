<!doctype html>
<html lang="en">
<body class="bg-white">
    <div width="100%" style="margin:0;padding:0!important;background-color:#f5f6fa">
        <span style="width:100%;background-color:#f5f6fa">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
                <tbody>
                    <tr>
                        <td style="padding:30px 0">
                            <table style="width:100%;max-width:620px;margin:0 auto">
                                <tbody>
                                    <tr>
                                        <td style="text-align:center;padding-bottom:15px">
                                            <img style="max-height:50px;width:auto"
                                                src="{{ asset('/images/' . $settings->site_logo) }}"
                                                alt="{{ $settings->site_name }}" class="CToWUd">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff">
                                <tbody>
                                    <tr>
                                        <td width="150">Amount</td>
                                        <td width="25">&nbsp;&nbsp; &nbsp;&nbsp;</td>
                                        <td> {{ $data->currency }} {{ $data->amount }}</td>
                                    </tr>
                                    <tr> <td> <br> </td></tr>
                                    <tr>
                                        <td width="150">Products</td>
                                        <td width="25">&nbsp;&nbsp; &nbsp;&nbsp;</td>
                                      
                                        <td>
                                            @php
                                            
                                                $prod = json_decode($data->products_name,true);
                                                $x = 1;
                                                foreach ($prod as $items) {
                                                    echo '<strong>' .
                                                        $x .
                                                        ':</strong> ' .
                                                        $items .
                                                        '<br>';
                                                    $x++;
                                                }
                                            @endphp
                                    </tr>
                                    <tr>
                                        <td> 
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff; padding:10px">
                            <p> Click on <a href="{{$data->payment_link}}"> Here</a> to compete your order payment or copy the code below and paste on a browser {{$data['payment_link']}}</p>
                            </div>
        </span>
        <div class="yj6qo">
        </div>
        <div class="adL">
        </div>
    </div>
</body>

</html>
