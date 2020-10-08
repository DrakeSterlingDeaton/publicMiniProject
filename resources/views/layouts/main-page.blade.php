<head>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="{{asset('css/main-page.css')}}" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Vue -->
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <!-- Anime -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
</head>
<body>

<script>
    let vueEx = new Vue({
        el: '#vue-ex',
        data: {
            text: ''
        }
    })

</script>

<canvas class="div1 fill fireworks">
</canvas>

    <div class="div2 fill">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navbar-brand nav-div">Hello,&nbsp;<span id="user-id">{{Auth::user()->name}}</span>
                <form class="no-m" method="post" action="/logout">
                    @csrf
                    <input type="submit" class="btn btn-primary" value="Logout">
                </form>
            </div>


        </nav>

        <div class="container">

            <h1 class="ml2">Simple Messaging Service</h1>

            <div class="row box1">
                <div class="col-12 col-md-10 offset-md-1">
                    <form class="main-form" method="post" action="{{ route('messages.store') }}" >
                        @csrf
                        <div class="main-form-inner">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Submitter Name</label>
                                <select class="form-control @error('sender') is-invalid @enderror" name="sender" id="exampleFormControlSelect1">

                                    @foreach($users as $user)
                                        <option>
                                            {{$user->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('sender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Push Urgency</label>
                                <select class="form-control @error('rating') is-invalid @enderror" name="rating" id="exampleFormControlSelect1">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                                @error('rating')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" name="message" v-model="text" value="{{ old('message') }} id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('message')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="button-box">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row box2">
                <div class="col-12 col-md-10 offset-md-1">
                    <div class="card messages-box">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="inbox" aria-labelledby="inbox-tab" role="tabpanel">
                                <div>

                                    <div class="row p-4 no-gutters align-items-center">
                                        <div class="col-sm-12 col-md-6">
                                            <h3 class="font-light mb-0"><i class="ti-email mr-2"></i>{{count($messages)}} Reminders</h3>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                        </div>
                                    </div>

                                    <!-- Mail list-->
                                    <div class="table-responsive">
                                        <table class="table email-table no-wrap table-hover v-middle mb-0 font-14">
                                            <tbody>

                                            @section('content')
                                            @show

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

{{--        <!-- Vue Box -->--}}
{{--        <div id="vue-ex" class="vue-box d-none d-xl-block">--}}
{{--            <h3 class="ml3" v-model="text">--}}
{{--                Vue Flex--}}
{{--            </h3>--}}
{{--            <p><script>vueEx.text</script></p>--}}
{{--        </div>--}}


        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form id="edit-form" class="main-form" method="post" action="{{ route('messages.update') }}" >
                            @csrf
                            <div class="form-group">
                                <input id="edited-message" name="message_id", value="" class="d-none">
                                <textarea class="form-control" name="message" value="" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Submit Changes" form="edit-form">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    $( document ).ready( () => {

        $('.edit-button').click(function() {
            let splitId = $(this).attr('id').split('-');
            let rowId = splitId[splitId.length -1];
            let message = $('#text_message_id' + rowId).html();
            $("#exampleFormControlTextarea1").html(message);
            $("#edited-message").val(rowId);
        })

    });

    </script>

    <script>
        // Wrap every letter in a span
        var textWrapper = document.querySelector('.ml2');
        textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

        anime.timeline({loop: false})
            .add({
                targets: '.ml2 .letter',
                scale: [4,1],
                opacity: [0,1],
                translateZ: 0,
                easing: "easeOutExpo",
                duration: 950,
                delay: (el, i) => 70*i
            }).add({
            targets: '.ml2',
            opacity: 0,
            duration: 1000,
            easing: "easeOutExpo",
            delay: 1000000000000000
        });
    </script>

    <script>
    window.human = false;

    var canvasEl = document.querySelector('.fireworks');
    var ctx = canvasEl.getContext('2d');
    var numberOfParticules = 30;
    var pointerX = 0;
    var pointerY = 0;
    var tap = ('ontouchstart' in window || navigator.msMaxTouchPoints) ? 'touchstart' : 'mousedown';
    var colors = ['#FF1461', '#18FF92', '#5A87FF', '#FBF38C'];

    function setCanvasSize() {
        canvasEl.width = window.innerWidth * 2;
        canvasEl.height = window.innerHeight * 2;
        canvasEl.style.width = window.innerWidth + 'px';
        canvasEl.style.height = window.innerHeight + 'px';
        canvasEl.getContext('2d').scale(2, 2);
    }

    function updateCoords(e) {
        pointerX = e.clientX || e.touches[0].clientX;
        pointerY = e.clientY || e.touches[0].clientY;
    }

    function setParticuleDirection(p) {
        var angle = anime.random(0, 360) * Math.PI / 180;
        var value = anime.random(50, 180);
        var radius = [-1, 1][anime.random(0, 1)] * value;
        return {
            x: p.x + radius * Math.cos(angle),
            y: p.y + radius * Math.sin(angle)
        }
    }

    function createParticule(x,y) {
        var p = {};
        p.x = x;
        p.y = y;
        p.color = colors[anime.random(0, colors.length - 1)];
        p.radius = anime.random(16, 32);
        p.endPos = setParticuleDirection(p);
        p.draw = function() {
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, true);
            ctx.fillStyle = p.color;
            ctx.fill();
        }
        return p;
    }

    function createCircle(x,y) {
        var p = {};
        p.x = x;
        p.y = y;
        p.color = '#FFF';
        p.radius = 0.1;
        p.alpha = .5;
        p.lineWidth = 6;
        p.draw = function() {
            ctx.globalAlpha = p.alpha;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.radius, 0, 2 * Math.PI, true);
            ctx.lineWidth = p.lineWidth;
            ctx.strokeStyle = p.color;
            ctx.stroke();
            ctx.globalAlpha = 1;
        }
        return p;
    }

    function renderParticule(anim) {
        for (var i = 0; i < anim.animatables.length; i++) {
            anim.animatables[i].target.draw();
        }
    }

    function animateParticules(x, y) {
        var circle = createCircle(x, y);
        var particules = [];
        for (var i = 0; i < numberOfParticules; i++) {
            particules.push(createParticule(x, y));
        }
        anime.timeline().add({
            targets: particules,
            x: function(p) { return p.endPos.x; },
            y: function(p) { return p.endPos.y; },
            radius: 0.1,
            duration: anime.random(1200, 1800),
            easing: 'easeOutExpo',
            update: renderParticule
        })
            .add({
                targets: circle,
                radius: anime.random(80, 160),
                lineWidth: 0,
                alpha: {
                    value: 0,
                    easing: 'linear',
                    duration: anime.random(600, 800),
                },
                duration: anime.random(1200, 1800),
                easing: 'easeOutExpo',
                update: renderParticule,
                offset: 0
            });
    }

    var render = anime({
        duration: Infinity,
        update: function() {
            ctx.clearRect(0, 0, canvasEl.width, canvasEl.height);
        }
    });

    document.addEventListener(tap, function(e) {
        window.human = true;
        render.play();
        updateCoords(e);
        animateParticules(pointerX, pointerY);
    }, false);

    var centerX = window.innerWidth / 2;
    var centerY = window.innerHeight / 2;

    function autoClick() {
        if (window.human) return;
        animateParticules(
            anime.random(centerX-50, centerX+50),
            anime.random(centerY-50, centerY+50)
        );
        anime({duration: 200}).finished.then(autoClick);
    }

    // autoClick();
    setCanvasSize();
    window.addEventListener('resize', setCanvasSize, false);
</script>

</body>

