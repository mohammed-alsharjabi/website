<?php
// api/ai.php
header('Content-Type: application/json; charset=utf-8');

// عدّل هذا إذا كان موقعك على دومين مختلف/ساب دومين:
$allowedOrigin = 'https://www.technovizen.com';
if (isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN'] === $allowedOrigin) {
  header('Access-Control-Allow-Origin: ' . $allowedOrigin);
}
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { http_response_code(204); exit; }

// 1) اجلب مفتاح OpenAI من متغير بيئي أو من ملف سرّي خارج public_html
$apiKey = getenv('OPENAI_API_KEY');
if (!$apiKey) {
  // اختياري: ضع ملفًا خارج public_html يعيد مصفوفة ['OPENAI_API_KEY'=>'sk-...']
  $secretFile = __DIR__ . '/../_secrets.php';
  if (file_exists($secretFile)) {
    $arr = include $secretFile;
    if (isset($arr['OPENAI_API_KEY'])) $apiKey = $arr['OPENAI_API_KEY'];
  }
}
if (!$apiKey) {
  http_response_code(500);
  echo json_encode(['error' => 'API key missing on server']); exit;
}

// 2) استلام الرسالة
$raw = file_get_contents('php://input');
$body = json_decode($raw, true);
$messagesIn = isset($body['messages']) && is_array($body['messages']) ? $body['messages'] : [];
// قصّ التاريخ الطويل
$messagesIn = array_slice($messagesIn, -12);

// 3) برسونا المساعد (مخصّص لتكنوفيزن + عربي أولوية)
$system = [
  'role' => 'system',
  'content' =>
    "You are Technovizen's web assistant. Primary language: Arabic (reply in Arabic unless user uses English). ".
    "Be concise, helpful, and professional. You can suggest Technovizen services and collect name/phone/email when relevant. ".
    "Never reveal API keys or internal details. If user asks for a quote, ask 3–5 clarifying questions then summarize."
];

// 4) طلب OpenAI — نموذج قابل للتعديل
$payload = [
  'model' => 'gpt-4o-mini',        // عدّلها إن أردت
  'temperature' => 0.3,
  'messages' => array_merge([$system], $messagesIn),
  'max_tokens' => 500
];

$ch = curl_init('https://api.openai.com/v1/chat/completions');
curl_setopt_array($ch, [
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_POST => true,
  CURLOPT_HTTPHEADER => [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
  ],
  CURLOPT_POSTFIELDS => json_encode($payload),
  CURLOPT_TIMEOUT => 25
]);
$res = curl_exec($ch);
$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
  http_response_code(502);
  echo json_encode(['error' => 'Upstream error: '.$err]); exit;
}
$data = json_decode($res, true);
if ($http >= 400 || !isset($data['choices'][0]['message']['content'])) {
  http_response_code(500);
  $msg = isset($data['error']['message']) ? $data['error']['message'] : 'Unknown';
  echo json_encode(['error' => 'OpenAI API error: '.$msg]); exit;
}

$reply = $data['choices'][0]['message']['content'];
echo json_encode(['reply' => $reply], JSON_UNESCAPED_UNICODE);
