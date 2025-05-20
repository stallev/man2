<?php
const TELEGRAM_BOT_TOKEN = '6182946148:AAHBsB65GX4If11WzjMWsQuODrcOKmiMs-o';
const TELEGRAM_CHAT_ID   = '-1001964614294';

function sendDataToTelegram($message) {
  $telegram_url  = 'https://api.telegram.org/bot' . TELEGRAM_BOT_TOKEN . '/sendMessage';
  $telegram_data = [
    'chat_id' => TELEGRAM_CHAT_ID,
    'text'    => $message,
  ];

  $args = [
    'body'    => $telegram_data,
    'headers' => [
      'Content-Type' => 'application/x-www-form-urlencoded',
    ],
    'timeout' => 15,
  ];

  // Отправляем запрос в Telegram API
  $response = wp_remote_post( $telegram_url, $args );

  if ( is_wp_error( $response ) || wp_remote_retrieve_response_code( $response ) !== 200 ) {
    // Если возникла ошибка при отправке, можно обработать ее здесь
    // например, записать в лог или отправить email администратору
  } else {
    // Успешная отправка, вернем ответ на клиент
    wp_send_json( [ 'success' => true, 'message' => 'Спасибо за ваше обращение! Мы свяжемся с вами в ближайшее время.' ] );
  }
}

// Обработка submit формы
if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset( $_POST['contact_form1'] )) {
    $name    = sanitize_text_field( $_POST['person-name'] );
    $phone   = sanitize_text_field( $_POST['person-phone'] );
    $personMessage   = sanitize_text_field( $_POST['person-message'] );
    $message = "Запрос на консультацию из формы секции контактов:
      \nИмя клиента: $name
      \nТелефон клиента: $phone
      \nСообщение от клиента: $personMessage
      ";
    // Отправка сообщения в Telegram
    sendDataToTelegram($message);
  }
}

if ( $_SERVER['REQUEST_METHOD'] === 'POST') {
  if(isset( $_POST['modal_contact_form'] )) {
    $name    = sanitize_text_field( $_POST['person-name'] );
    $phone   = sanitize_text_field( $_POST['person-phone'] );
    $personMessage   = sanitize_text_field( $_POST['person-message'] );
    $requestType   = sanitize_text_field( $_POST['type'] );
    $message = "Запрос на консультацию из модальной формы:
      \nИмя клиента: $name
      \nТелефон клиента: $phone
      \nСообщение от клиента: $personMessage
      \nВид заявки: $requestType
      ";
    // Отправка сообщения в Telegram
    sendDataToTelegram($message);
  }
}
