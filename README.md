# Câu hỏi

## Chapter 1

### Câu 1: Có những cách nào để tạo một project Laravel?

Có một số cách để tạo một project laravel như sau:

-   Cách 1: Với Composer Create-Project
    ```sh
    composer create-project laravel/laravel example-app
    ```
-   Cách 2: Với Laravel Installer
    ```sh
    composer global require laravel/installer
    laravel new example-app
    ```
-   Cách 3: Clone trên git về

### Câu 2: Nêu mục đích chính, ngắn gọn của các thư mục trong dự án

-   app: Chứa mã nguồn chính của ứng dụng Laravel, bao gồm các file mô hình, controllers, middleware và các logic xử lý chính của ứng dụng.
    -   HTTP: chứa các controllers, middleware, và form requests. Tất cả các logic xử lý requests vào ứng dụng của bạn sẽ nằm ở trong thư mục này.
    -   Exceptions: chứa các xử lý exception trong ứng dụng của bạn ngoài ra nó còn là nơi tốt để bắn ra nhiều exception bởi ứng dụng
    -   Providers: chứa tất cả các service providers ứng dụng
    -   Model: chứa tất cả các lớp eloquent model của ứng dụng
    -   Console: chứa tất cả những file Artisan commands ứng dụng
-   bootstrap: Chứa các tệp khởi động ban đầu của ứng dụng, giúp tạo ra môi trường chạy ứng dụng.
-   config: Chứa các tệp cấu hình của ứng dụng, bao gồm các cài đặt liên quan đến cơ sở dữ liệu, hệ thống, email,...
-   database: Chứa các tệp liên quan đến cơ sở dữ liệu, bao gồm các tệp để tạo và chỉnh sửa các bảng (migrations), seeds (dữ liệu mẫu) và factories (các tạo đối tượng mẫu).
-   public: Chứa tệp giao diện người dùng có thể truy cập trực tiếp từ web, bao gồm tệp CSS, JavaScript, hình ảnh và các tệp tĩnh khác.
-   resources: Chứa các tệp nguồn tài liệu cho giao diện người dùng, bao gồm các tệp CSS, JavaScript, tệp Blade (được sử dụng cho mẫu giao diện), và các tệp nguồn tài liệu khác.
-   routes: Chứa các tệp định tuyến, xác định cách các URL được xử lý bởi các hành động trong controllers.

-   storage: Chứa dữ liệu lưu trữ bởi ứng dụng, bao gồm các tệp tải lên bởi người dùng và các tệp nhật ký (logs).

-   tests: Chứa các tệp kiểm tra đơn vị và kiểm tra tích hợp để đảm bảo rằng mã nguồn hoạt động đúng và như mong đợi.

-   vendor: Chứa các thư viện bên ngoài được sử dụng trong dự án, bao gồm các gói Composer.

-   .env: Tệp cấu hình môi trường, chứa các biến môi trường cho ứng dụng.

-   .git: Chứa thông tin và lịch sử của dự án dành cho hệ thống quản lý phiên bản Git.

-   composer.json: Tệp cấu hình cho Composer, quản lý các gói PHP bên ngoài được sử dụng trong dự án.

-   package.json: Tệp cấu hình cho npm, quản lý các gói JavaScript bên ngoài được sử dụng trong dự án.

### Câu 3: Vòng đời của 1 request trong laravel ?

-   Khỏi động (Bootstrap): Đầu tiên từ phía client sẽ gửi một request (mũi tên màu xanh) đến file public/index.php, nó là đích đến của tất cả các request từ client. Dù code không nhiều nhưng nó là khởi nguyên cho framework.
    -   1. Đăng ký cơ chế autoload (Register the auto loader)
    -   2. Chuẩn bị để khởi động ứng dụng (Prepare to bootstrap the application)
            - a. Tạo ứng dụng (Create the application)
            - b. Đăng ký các interface quan trọng (Bind important interfaces)
            - c. Trả về đối tượng ứng dụng (Return the application)
    -   3. Chạy ứng dụng (Run the application)
-   HTTP/Console Kernel: Tiếp theo, request sẽ được gửi đến HTTP Kernel hoặc Console Kernel, tùy thuộc vào request được gửi từ đâu. Hiện tại chúng ta chỉ quan tâm đến HTTP Kerne: l nằm ở file app/Http/Kernel.php.
-   Service providers: Một trong những công việc quan trọng nhất của HTTP Kernel đó chính là load các service provider. Tất cả các service provider được cấu hình trong file config/app.php. Quá trình load các service provider sẽ trải qua hai quá trình:
    -   Đăng ký service provider (Register service provider)
    -   Khởi động service provider (Bootstrap service provider)
-   Router: Sau khi hoàn tất load service provider, các request sẽ được gửi đến router.
    -   Route -> Middleware -> Controller/Action
    -   Route -> Controller/Action
-   Middleware: middleware sẽ xử lý logic theo những ràng buộc mà coder đặt ra để quyết định xem request đó có được đi tiếp hay là không.
-   Phương thức xử lý (Handle method): Có hai phương thức xử lý request đó chính là controller hoặc action (Closure object). Nhìn chung thì hai phương thức này đều hoạt động như nhau nhưng cách thể hiện và hiệu năng lại khác nhau.
-   Phương thức trả về (Return method)
    -   Trả về response thông qua View
    -   Trả về response không thông qua View
