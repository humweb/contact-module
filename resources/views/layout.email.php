<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width">
    <title>@yield('$title')</title>
</head>
<body>
<table class="body">
    <tr>
        <td class="float-center" align="center" valign="top">
            <br>
            <table align="center" class="container float-center">
                <tbody>
                <tr>
                    <td>
                        <table class="row">
                            <tbody>
                            <tr>
                                <th class="small-12 large-12 columns first last">
                                    @yield('title')
                                    @yield('intro')
                                    <table>
                                        <tr>
                                            <th>
                                                @yield('content')
                                            </th>
                                        </tr>
                                    </table>
                                </th>
                            </tr>
                            </tbody>
                        </table>
                        <table class="wrapper secondary" align="center">
                            <tr>
                                <td class="wrapper-inner">
                                    <table class="row">
                                        <tbody>
                                        <tr>
                                            <th class="small-12 large-12 columns">
                                                <p>Copyright © {{ date('Y') }} Dark Star Mountain Bike Tours. All rights reserved.</p>
                                            </th>
                                        </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>
</body>

</html>