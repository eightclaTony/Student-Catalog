<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php
    // 获取URL参数
    $markdownFile = isset($_GET['file']) ? $_GET['file'] : 'powershadow.md'; // 默认文件

    // 初始化标题
    $pageTitle = "默认标题";

    // 读取Markdown文件并提取标题
    if (file_exists($markdownFile)) {
        $fileContent = file_get_contents($markdownFile);
        
        // 将Markdown内容按行分割
        $lines = explode("\n", $fileContent);
        
        // 查找第一个以 '#' 开头的行
        foreach ($lines as $line) {
            if (preg_match('/^#\s*(.*)$/', $line, $matches)) {
                $pageTitle = trim($matches[1]); // 获取第一个标题内容
                break; // 找到标题后退出循环
            }
        }

        $pageTitle = htmlspecialchars($pageTitle); // 转义标题中的特殊字符以安全输出
    } else {
        $pageTitle = "文件不存在"; // 如果文件不存在的情况下
    }
  ?>
  <title><?php echo $pageTitle; ?></title> <!-- 将标题设置为Markdown文件的标题 -->
  <link href="../css/bootstrap.min.css" rel="stylesheet"> <!-- 引入Bootstrap样式 -->
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 1.5em; /* 放大字体 */
    }
    .markdown-container {
      max-width: 1500px; /* 调整为更宽的最大宽度 */
      margin: 0 auto;
      padding: 20px;
    }
    /* 特定样式，避免Bootstrap影响Markdown内容 */
    .markdown-container h1, 
    .markdown-container h2, 
    .markdown-container h3, 
    .markdown-container h4, 
    .markdown-container h5, 
    .markdown-container h6 {
      margin-top: 1.5rem; /* 调整标题的上外边距 */
      margin-bottom: 1rem; /* 调整标题的下外边距 */
      font-weight: bold; /* 自定义字体粗细 */
    }
    .markdown-container p, 
    .markdown-container li {
      line-height: 1.6; /* 行间距 */
    }
    .markdown-container blockquote {
      border-left: 5px solid #ccc; /* 自定义引用样式 */
      padding-left: 10px;
      margin: 1rem 0;
      color: #555; /* 颜色 */
    }
  </style>
</head>
<body>
  <div class="markdown-container">
    <div class="text-center mb-3"> <!-- 使用 text-center 类来居中内容 -->
      <a href="../index.html" class="btn btn-outline-primary">返回首页</a> <!-- 返回首页按钮 -->
      <a href="javascript:history.back()" class="btn btn-outline-secondary">返回</a> <!-- 返回按钮 -->
    </div>
    
    <?php
      // 检查文件是否存在
      if (file_exists($markdownFile)) {
          // 使用Parsedown库解析Markdown
          require 'Parsedown.php';
          $parsedown = new Parsedown();
          echo $parsedown->text($fileContent); // 输出完整的Markdown内容
      } else {
          echo "<p>文件不存在: " . htmlspecialchars($markdownFile) . "</p>";
      }
    ?>
  </div>

  <script src="../js/jquery-3.5.1.min.js"></script> <!-- 引入必要的JavaScript -->
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
