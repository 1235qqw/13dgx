import pygame
import random

# Инициализация Pygame
pygame.init()

# Константы
WIDTH, HEIGHT = 800, 600
WHITE = (255, 255, 255)
GREEN = (0, 255, 0)
BLACK = (0, 0, 0)

# Настройки автомобиля
CAR_WIDTH, CAR_HEIGHT = 50, 30
car_x, car_y = WIDTH // 2, HEIGHT - 100
car_velocity = 0
gravity = 0.5
jump_strength = -10
on_ground = True

# Настройки земли
ground_height = 50
ground_y = HEIGHT - ground_height

# Настройки экрана
screen = pygame.display.set_mode((WIDTH, HEIGHT))
pygame.display.set_caption("Hill Dash Racing")

# Загрузка изображения автомобиля
car_image = pygame.Surface((CAR_WIDTH, CAR_HEIGHT))
car_image.fill(BLACK)

# Главный игровой цикл
running = True
while running:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    keys = pygame.key.get_pressed()
    if keys[pygame.K_LEFT]:
        car_x -= 5
    if keys[pygame.K_RIGHT]:
        car_x += 5
    if keys[pygame.K_SPACE] and on_ground:
        car_velocity = jump_strength
        on_ground = False

    # Физика автомобиля
    car_velocity += gravity
    car_y += car_velocity

    # Проверка на столкновение с землёй
    if car_y >= ground_y - CAR_HEIGHT:
        car_y = ground_y - CAR_HEIGHT
        car_velocity = 0
        on_ground = True

    # Заполнение фона
    screen.fill(WHITE)
    pygame.draw.rect(screen, GREEN, (0, ground_y, WIDTH, ground_height))
    
    # Отрисовка автомобиля
    screen.blit(car_image, (car_x, car_y))

    # Обновление экрана
    pygame.display.flip()

    # Ограничение FPS
    pygame.time.Clock().tick(60)

pygame.quit()
