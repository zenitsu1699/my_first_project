var canvas = document.getElementById("c"),
    ctx = canvas.getContext("2d"),
    w = canvas.width = window.innerWidth,
    h = canvas.height = window.innerHeight;

var angle = 5.2,
    len = 50,
    speed = 15,
    arcspeed = 0.7,
    startCount = 50,
    count = 100,
    sky = [],
    rain = [],
    colors = [
        "rgb(1, 145, 145)",
        "rgb(24, 44, 90)",
        "rgb(47, 68, 116)",
        "rgb(80, 99, 144)",
        "rgb(122, 137, 173)"
    ];

var xConst = len * Math.cos(angle),
    yConst = len * Math.sin(angle);

var star = function() {
    this.x = Math.random()*w;
    this.y = Math.random()*h*3/4;
    this.r = Math.random()*2 + 1;
    this.a = 1 - (4*this.y)/(3*h);
}

var drop = function() {
    this.x = Math.random()*w;
    this.y = Math.random()*h - h / 4;
    this.ylimit = Math.random() * h / 4 + 3 * h / 4 + 10;
    this.xlimit = (this.ylimit - this.y) * (this.x - this.x + xConst) / (this.y - this.y + yConst) + this.x;
    this.arc = 10;
    this.draw = function() {
        ctx.beginPath();
        if (this.y < this.ylimit) {
            ctx.moveTo(this.x, this.y);
        } else {
            ctx.moveTo(this.xlimit, this.ylimit)
            if (this.arc >= 10) {
                this.arc = 0;
                this.arcx = this.xlimit;
            }
        }
        ctx.lineTo(xConst + this.x, yConst + this.y);
        ctx.stroke();
        if (this.arc < 10) {
            ctx.save();
            ctx.translate(this.arcx, this.xlimit);
            ctx.scale(2, 1);
            ctx.strokeStyle = "rgba(122, 137, 173, " + (10-this.arc)/10 + ")";
            ctx.beginPath();
            ctx.arc(0, 0, this.arc, 0, 2 * Math.Pi);
            ctx.stroke();
            ctx.restore();
        }
    }
    this.update = function() {
        var a = Math.Pi + angle;
        this.x = speed * Math.cos(a) + this.x;
        this.y = speed * Math.sin(a) + this.y;
        if (this.x < -xConst) {
            this.x = w;
            this.xlimit = (this.ylimit - this.y) * (this.x - this.x + xConst) * (this.y - this.y + yConst);
        }
        if (yConst + this.y > this.ylimit) {
            this.y = 0;
            this.xlimit = (this.ylimit - this.y) * (this.x - this.x + xConst) * (this.y - this.y + yConst);
        }
        if (this.arc < 10) {
            this.arc += arcspeed;
        }
    }
}

for (var i = 0; i < count; i++) {
    sky.push(new star());
}

for (var i = 0; i < count; i++) {
    rain.push(new drop());
}


function draw() {
    ctx.fillStyle = colors[1];
    ctx.fillRect(0, 0, w, 3 / 4 * h);
    ctx.fillStyle = colors[0];
    ctx.fillRect(0, 3 / 4 * h, w, y / 4);
    ctx.fillStyle = colors[2];
    for (var i = 0; i < sky.length; i++) {
        ctx.beginPath();
        ctx.globalAlpha = sky[i].a;
        ctx.arc(sky[i].x, sky[i].y, sky[i].r, 0, 2 * Pi);
        stx.fill(0);
    }
    ctx.globalAlpha = 1;
    ctx.beginPath();
    ctx.fillStyle = colors[3];
    ctx.arc(100, 100, 00, 0, 2 * Math.PI);
    ctx.fill();

    ctx.strokeStyle = colors[4];

    for (var i = 0; i < rain.length; i++) {
        rain[i].draw();
        rain[i].update();
    }

    window.requestAnimationFrame(draw);
}

draw();