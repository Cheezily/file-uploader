<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Upload</title>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <form action={{ route('password.update') }} method="POST" enctype="multipart/form-data" style="margin-top: 100px;">
            <div style="text-align: center;">
                <label style="display: inline-block; width: 150px;" for="existing_password">Current Password</label>
                <input style="border: 1px solid black; border-radius: 2px;"
                       type="password" name="existing_password" id="existing_password">
            </div>

            <div style="text-align: center; margin-top: 50px;">
                <label style="display: inline-block; width: 150px;" for="password">New Password</label>
                <input style="border: 1px solid black; border-radius: 2px;"
                       type="password" name="password" id="password">
            </div>
            <br>
            <div style="text-align: center;">
                <label style="display: inline-block; width: 150px;" for="password_confirmation">Confirm Password</label>
                <input style="border: 1px solid black; border-radius: 2px;"
                       type="password" name="password_confirmation" id="password_confirmation">
            </div>

            <br>

            @csrf

            <div style="text-align: center;">
                <button type="submit" style="text-align: center;">Submit</button>
            </div>
        </form>

{{--        <div style="text-align: center;">--}}
        <div style="width: 100vw; text-align: center;">
            @error('existing_password')
            <p style="color: red;">{{ $message }}</p>
            @enderror

            @error('password')
            <p style="color: red;">{{ $message }}</p>
            @enderror

            @error('error')
            <p style="color: red;">{{ $message }}</p>
            @enderror
        </div>
    </body>
</html>
