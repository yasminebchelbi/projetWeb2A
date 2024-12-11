<?php
// التحقق من أن الفئة DatabaseConfig لم يتم تعريفها مسبقًا
if (!class_exists('DatabaseConfig')) {
    class DatabaseConfig {
        private static $pdo = null;

        // استرجاع الاتصال بقاعدة البيانات
        public static function getConnexion()
        {
            if (!isset(self::$pdo)) {
                try {
                    self::$pdo = new PDO(
                        'mysql:host=127.0.0.1;dbname=event', // استبدل 'event' باسم قاعدة بياناتك
                        'root', // اسم المستخدم
                        '', // كلمة المرور
                        [
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        ]
                    );
                } catch (Exception $e) {
                    die('Erreur: ' . $e->getMessage());
                }
            }
            return self::$pdo;
        }

        // دالة للاستعلامات المعقدة
        public static function executeQuery($sql, $params = [])
        {
            $pdo = self::getConnexion();
            
            try {
                $stmt = $pdo->prepare($sql);
                $stmt->execute($params);
                
                if (stripos($sql, 'SELECT') === 0) {
                    return $stmt->fetchAll();
                }
                return true;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }
    }
}
?>
