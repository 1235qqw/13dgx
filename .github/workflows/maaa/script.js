const canvas = document.getElementById('gameCanvas');
const ctx = canvas.getContext('2d');

const carWidth = 40;
const carHeight = 20;

let car = {
    x: 50,
    y: canvas.height - carHeight - 10,
    width: carWidth,
    height: carHeight,
    speed: 0,
    gravity: 0.5,
    lift: -10,
};

let terrain = [];

function generateTerrain() {
    for (let i = 0; i < canvas.width; i += 50) {
        terrain.push(canvas.height - Math.random() * 100 - 20);
    }
}

function drawCar() {
    ctx.fillStyle = 'red';
    ctx.fillRect(car.x, car.y, car.width, car.height);
}

function drawTerrain() {
    ctx.fillStyle = 'green';
    terrain.forEach((height, index) => {
        ctx.fillRect(index * 50, height, 50, canvas.height - height);
    });
}

function update() {
    car.speed += car.gravity;
    car.y += car.speed;

    if (car.y + car.height >= canvas.height) {
        car.y = canvas.height - car.height;
        car.speed = 0;
    }

    if (car.x >= canvas.width) {
        car.x = 0;
    }

    ctx.clearRect(0, 0, canvas.width, canvas.height);
    drawTerrain();
    drawCar();
}

function accelerate() {
    car.speed += car.lift;
}

function brake() {
    car.speed -= 0.5;
}

document.getElementById('buttonAccelerate').addEventListener('mousedown', accelerate);
document.getElementById('buttonBrake').addEventListener('mousedown', brake);

generateTerrain();
setInterval(update, 1000 / 60);
