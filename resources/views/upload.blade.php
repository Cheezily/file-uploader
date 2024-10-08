<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Upload</title>

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <form action={{ route('upload.upload') }} method="POST" enctype="multipart/form-data" style="margin: 100px 50%;">
            <div style="text-align: center;">
                <label style="display: inline-block; width: 150px;" for="file">Select File</label>
                <input type="file" name="file" id="file" />
            </div>

            <br>

            <div style="text-align: center;">
                <label style="display: inline-block; width: 150px;" for="password">Password</label>
                <input style="border: 1px solid black; border-radius: 2px;"
                   type="password" name="password" id="password">
            </div>

            <br>

            @csrf

            <div style="text-align: center;">
                <button type="submit">Submit</button>
            </div>

            <div style="width: 100vw;">
                @error('password')
                <p style="color: red;">{{ $message }}</p>
                @enderror

                @error('file')
                <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>

        </form>
    </body>
</html>
