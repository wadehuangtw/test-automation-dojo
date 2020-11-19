# 使用原生 PHP 撰寫測試案例

這裡將會帶大家從無到在原生的 PHP 環境中執行測試案例。

在 originPHP 底下總共有兩個目錄，分別為 `Src` 和 `Tests`。

前置作業：
1. 在你的電腦安裝 Git、Composer

### Src 目錄

裡面包含 Collection.php、Collectable.php，是用來讓大家練習如何 **按照 Interface 所定義的行為來撰寫測試案例**：

- Collectable.php 是一個介面（Interface）用來定義集合物件的行為，包括每個方法的預期行為及返回內容。

- Collection.php 實作 Collectable 介面。根據 Collectable 介面的定義實作所有 Collectable 的方法。
  - 因為這是要給大家練習寫測試用的，故留給大家一邊寫測試案例一邊實作。

### Tests 目錄

裡面包含 CollectionTest.php，專門用來測試 Collection.php 的所有方法。

在這個測試案例中，請大家一律採用 3A 原則來設計你的測試案例。

我有準備一個 testAll() 來示範 3A 原則的寫法。
但是 testAll() 目前是紅燈（未通過測試），請大家練習根據 Colletable 介面的定義實作 Collection.php 的 all() 方法，讓 testAll() 可以通過測試。

當你完成 testAll() 之後，請依樣畫葫蘆完成 Collection.php 的所有測試案例。

## 建置 originPHP 的環境步驟如下：
### Clone test-automation-dojo

先把練習測試的專案從 Github Clone 一份回本機

```bash
git clone https://github.com/WadeHuang1993/test-automation-dojo.git .
```

###  cd 至 originPHP 目錄

originPHP 這個目錄專門用來讓大家在原生的 PHP 環境邊寫測試案例。

故以下所有操作都應該先 cd 至 originPHP 目錄

```bash
cd {path to originPHP}
```

###  透過 Composer 安裝 PHP 專屬的測試框架 phpunit 9
```bash
composer require --dev phpunit/phpunit ^9
```

###  在 composer.json 加上 PSR-4 規則
替原始碼和測試案例加上 PSR-4 路徑，
讓我們可以透過 Composer 內建的 Autoload 機制存取自己寫的類別。

打開 composer.json，並加入以下區段
```diff
{
    "require-dev": {
        "phpunit/phpunit": "^9"
    },
+    "autoload": {
+        "psr-4": {
+            "Src\\": "Src/",
+            "Tests\\": "Tests/"
+        }
+    }
}
```

編輯完成後，記得執行以下命令，讓 Composer 產生新的 autoload 路徑對映檔案
（此動作只有每次異動到 composer.json 的 autoload 區段時才需執行）
```bash
composer dump-autoload
```

### 執行測試案例

透過 PHPUnit 執行 Tests 目錄底下的所有測試案例

```bash
./vendor/bin/phpunit ./Tests/
```