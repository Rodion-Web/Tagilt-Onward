<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Загружаем .env переменные
function loadEnv($path = __DIR__ . '/.env')
{
    if (!file_exists($path))
        return;
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0)
            continue;
        list($key, $value) = explode('=', $line, 2);
        putenv(trim($key) . '=' . trim($value));
    }
}
loadEnv();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Безопасная обработка данных
    function sanitize($value)
    {
        return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    }

    $name = sanitize($_POST["name"] ?? '');
    $email = sanitize($_POST["email"] ?? '');
    $phone = sanitize($_POST["phone"] ?? '');
    $age = sanitize($_POST["age"] ?? '');
    $jewish_roots = $_POST["jewish_roots"] ?? [];
    $jewish_roots = array_map('sanitize', $jewish_roots);
    $jewish_roots_str = implode(", ", $jewish_roots);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        exit("Неверный формат email.");
    }

    $mail = new PHPMailer(true);

    try {
        // Настройка SMTP
        $mail->isSMTP();
        $mail->Host = getenv('SMTP_HOST');
        $mail->SMTPAuth = true;
        $mail->Username = getenv('SMTP_USERNAME');
        $mail->Password = getenv('SMTP_PASSWORD');
        $mail->SMTPSecure = getenv('SMTP_SECURE');
        $mail->Port = getenv('SMTP_PORT');
        $mail->CharSet = 'UTF-8';

        // Отправитель и получатель
        $mail->setFrom(getenv('SMTP_USERNAME'), getenv('SMTP_FROM_NAME'));
        $mail->addAddress(getenv('SMTP_TO'));

        // Письмо
        $mail->isHTML(true);
        $mail->Subject = 'Новая заявка с сайта';
        $mail->Body = "
            <h2>Новая заявка:</h2>
            <p><strong>Имя:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Телефон:</strong> {$phone}</p>
            <p><strong>Возраст:</strong> {$age}</p>
            <p><strong>Еврейские корни:</strong> {$jewish_roots_str}</p>
        ";
        // Путь к файлу (создастся автоматически, если не существует)
        $file = 'submissions.csv';

        // Собираем данные
        $data = [
            date('Y-m-d H:i:s'), // Дата и время
            $name,
            $email,
            $phone,
            $age,
            $jewish_roots_str
        ];

        // Открываем файл на добавление
        $fp = fopen($file, 'a');
        if ($fp) {
            fputcsv($fp, $data);
            fclose($fp);
        }

        $mail->send();
        echo 'OK';
        exit;
    } catch (Exception $e) {
        error_log("Ошибка при отправке: " . $mail->ErrorInfo);
        echo "Ошибка при отправке. Попробуйте позже.";
    }
}
?>