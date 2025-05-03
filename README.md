# Line Counting Script for PHP Projects

This script counts the number of lines in files with specified extensions within a PHP project directory and generates an HTML report. Below are the details in both English and Vietnamese.

---

#-----------------------------------------------------------------

### Overview
The PHP script (`countLinesInProject.php`) recursively scans a project directory, counts lines in files with specified extensions (e.g., `.php`, `.js`, `.html`, `.css`), and outputs an HTML report. The report includes a table listing each file's path and line count, along with the total number of lines and files. Certain directories can be excluded from the count.

### Features
- Counts lines in files with user-defined extensions.
- Excludes specified directories from the scan.
- Generates a styled HTML table with file paths and line counts.
- Displays total lines and total files in the report.
- Uses responsive and modern CSS styling for the output.

### Requirements
- PHP 7.0 or higher.
- A web server (e.g., Apache, Nginx) to run the script.
- The project directory must be accessible by the script.

### Installation
1. Save the script as `countLinesInProject.php` in your project directory.
2. Ensure the web server has read permissions for the project directory.
3. Configure the script variables (see Usage).

### Usage
1. **Set the project directory**:
   Modify the `$projectDir` variable to point to your project directory. By default, it uses `$_SERVER['DOCUMENT_ROOT']`:
   ```php
   $projectDir = $_SERVER['DOCUMENT_ROOT'];
   ```

2. **Specify file extensions**:
   Update the `$extensions` array with the file extensions you want to count:
   ```php
   $extensions = ['php', 'js', 'html', 'css'];
   ```

3. **Exclude directories**:
   Add directories to exclude in the `$excludeDirs` array (use relative paths from `$projectDir`):
   ```php
   $excludeDirs = ['/PHPMailer/'];
   ```

4. **Run the script**:
   - Place the script in your web server's root or a subdirectory.
   - Access it via a browser (e.g., `http://your-server/countLinesInProject.php`).
   - The script will generate an HTML report displaying the line count for each file, total lines, and total files.

### Example Output
The script generates an HTML page with:
- A table listing each file's path and line count.
- A summary showing the total lines and total files.
- Styled with a clean, modern design (green headers, hover effects, etc.).

### Notes
- Ensure the project directory path is correct to avoid errors.
- The script skips hidden files and directories (e.g., those starting with a dot).
- Large projects may take time to process due to recursive scanning.

---

##---------------------------------------------------------------------------------------

### Tổng quan
Tập lệnh PHP (`countLinesInProject.php`) quét đệ quy một thư mục dự án, đếm số dòng trong các tệp có phần mở rộng được chỉ định (ví dụ: `.php`, `.js`, `.html`, `.css`) và tạo báo cáo HTML. Báo cáo bao gồm một bảng liệt kê đường dẫn và số dòng của mỗi tệp, cùng với tổng số dòng và tổng số tệp. Một số thư mục có thể được loại trừ khỏi quá trình đếm.

### Tính năng
- Đếm số dòng trong các tệp với phần mở rộng do người dùng chỉ định.
- Loại trừ các thư mục được chỉ định khỏi quá trình quét.
- Tạo bảng HTML được định dạng với đường dẫn tệp và số dòng.
- Hiển thị tổng số dòng và tổng số tệp trong báo cáo.
- Sử dụng kiểu dáng CSS hiện đại và responsive cho đầu ra.

### Yêu cầu
- PHP 7.0 hoặc cao hơn.
- Máy chủ web (ví dụ: Apache, Nginx) để chạy tập lệnh.
- Thư mục dự án phải có quyền truy cập đọc bởi tập lệnh.

### Cài đặt
1. Lưu tập lệnh dưới tên `countLinesInProject.php` trong thư mục dự án.
2. Đảm bảo máy chủ web có quyền đọc thư mục dự án.
3. Cấu hình các biến trong tập lệnh (xem Hướng dẫn sử dụng).

### Hướng dẫn sử dụng
1. **Thiết lập thư mục dự án**:
   Chỉnh sửa biến `$projectDir` để trỏ đến thư mục dự án của bạn. Mặc định, nó sử dụng `$_SERVER['DOCUMENT_ROOT']`:
   ```php
   $projectDir = $_SERVER['DOCUMENT_ROOT'];
   ```

2. **Chỉ định phần mở rộng tệp**:
   Cập nhật mảng `$extensions` với các phần mở rộng tệp bạn muốn đếm:
   ```php
   $extensions = ['php', 'js', 'html', 'css'];
   ```

3. **Loại trừ thư mục**:
   Thêm các thư mục cần loại trừ vào mảng `$excludeDirs` (sử dụng đường dẫn tương đối từ `$projectDir`):
   ```php
   $excludeDirs = ['/PHPMailer/'];
   ```

4. **Chạy tập lệnh**:
   - Đặt tập lệnh trong thư mục gốc của máy chủ web hoặc một thư mục con.
   - Truy cập qua trình duyệt (ví dụ: `http://your-server/countLinesInProject.php`).
   - Tập lệnh sẽ tạo báo cáo HTML hiển thị số dòng cho mỗi tệp, tổng số dòng và tổng số tệp.

### Ví dụ đầu ra
Tập lệnh tạo một trang HTML với:
- Một bảng liệt kê đường dẫn và số dòng của mỗi tệp.
- Một bản tóm tắt hiển thị tổng số dòng và tổng số tệp.
- Được định dạng với thiết kế hiện đại, sạch sẽ (tiêu đề màu xanh, hiệu ứng hover, v.v.).

### Lưu ý
- Đảm bảo đường dẫn thư mục dự án chính xác để tránh lỗi.
- Tập lệnh bỏ qua các tệp và thư mục ẩn (ví dụ: những tệp bắt đầu bằng dấu chấm).
- Các dự án lớn có thể mất thời gian xử lý do quét đệ quy.
