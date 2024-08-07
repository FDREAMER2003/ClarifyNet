<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','QA - Where all your questions would be answered')</title>
        @vite(['resources/css/app.css'])
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @yield('page-level-styles')
        <style>
            #myBtn {
                position: fixed;
                bottom: 30px;
                right: 30px; 
                background-color: rgb(195, 227, 5);
                color: #000000;
                padding: 18px 24px;
                border: none;
                border-radius: 50px;
                box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
                font-size: 18px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            #myBtn:hover {
                background-color: rgb(133, 143, 74);
                color: #fff;
                box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
                transform: translateY(-2px);
            }

            .modal {
                display: none;
                position: fixed;
                top: 320px;
                left: 30px;
                width: 450px;
                max-height: 550px;
                z-index: 1050;
                background-color: #e2eb46;
                border-radius: 15px;
                box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
                animation: chatbotOpen 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                overflow: hidden;
                border: 1px solid #f0f0f0;
            }

            .modal-content {
                padding: 25px;
                max-height: 560px;
                overflow-y: auto;
            }

            .close {
              color: #333;
              float: right;
              font-size: 20px;
              font-weight: bold; /* Made bold for emphasis */
              transition: color 0.3s ease;
          }

          .close:hover,
          .close:focus {
              color: #e74c3c;
              text-decoration: none;
              cursor: pointer;
          }

            @keyframes chatbotOpen {
                from {
                    opacity: 0;
                    transform: translate(-5%, -5%) scale(0.95);
                }
                to {
                    opacity: 1;
                    transform: translate(0, 0) scale(1);
                }
            }
            body {
              background-color: black;
              color: white; 
            }
        </style>
  </head>
  <body >
    @include('qa.layouts.partials._navbar')
    <div class="p-3" style="background-color: rgb(241, 245, 218)">
        @yield('content')
    </div>
    @include('qa.layouts.partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @vite(['resources/js/app.js'])
    @yield('page-level-scripts')
  </body>
</html>
