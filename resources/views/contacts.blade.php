@extends('layouts.app')

@section('content')
    <div class="contacts-container" style="max-width: 800px; margin: 0 auto; padding: 40px 20px; font-family: sans-serif;">
        <h1 style="text-align: center; margin-bottom: 50px;">Контакты</h1>

        <div class="contact-section" style="margin-bottom: 30px;">
            <h3 class="text-primary">Телефоны</h3>
            <p>Основной: +7 (000) 000-00-00</p>
            <p>Мессенджеры (WhatsApp, Telegram): +7 (000) 000-00-01</p>
            <small style="color: #666;">Звонки принимаем: ежедневно с 09:00 до 20:00.</small>
        </div>

        <div class="contact-section" style="margin-bottom: 30px;">
            <h3 class="text-primary">Электронная почта</h3>
            <p>Общие вопросы: info@название.ru</p>
            <p>Заявки на расчёт: zakaz@название.ru</p>
            <small style="color: #666;">Отвечаем в течение часа в рабочее время.</small>
        </div>

        <div class="contact-section" style="margin-bottom: 30px;">
            <h3 class="text-primary">Режим работы</h3>
            <p>Понедельник — пятница: 10:00-19:00</p>
            <p>Суббота: 11:00-17:00</p>
            <p>Воскресенье: <span style="color: red;">выходной</span></p>
        </div>

        <div class="map-section">
            <h3 class="text-primary">Адрес</h3>
            <div style="width: 100%; height: 400px; background: #eee; border-radius: 8px; overflow: hidden;">

                <img src="{{ asset('public/assets/img/map.png') }}" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
@endsection
