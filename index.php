<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生目录</title>
    <style>
        :root {
            --primary-color: #2a2a2a;
            --accent-color: #00ff9d;
            --text-color: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: var(--primary-color);
            color: var(--text-color);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            display: flex;
            min-height: 100vh;
            position: relative;
        }

        /* 首页样式 */
        #home-page {
            display: flex;
            width: 100%;
            padding: 140px;
            transition: transform 0.5s ease;
        }

        .intro-section {
            flex: 1;
            padding-right: 60px;
            border-right: 2px solid #3d3d3d;
        }

        .button-section {
            flex: 0 0 300px;
            padding-left: 60px;
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .nav-button {
            background: #1a1a1a;
            border: 2px solid var(--accent-color);
            color: var(--accent-color);
            padding: 18px 30px;
            font-size: 1.1em;
            cursor: pointer;
            transition: all 0.3s ease;
            border-radius: 8px;
            text-align: left;
        }

        .nav-button:hover {
            background: var(--accent-color);
            color: var(--primary-color);
            transform: translateX(10px);
        }

        /* 教程索引页样式 */
        #tutorial-page {
            position: absolute;
            top: 0;
            left: 100%;
            width: 100%;
            height: 100%;
            padding: 40px;
            background: var(--primary-color);
            transition: transform 0.5s ease;
        }
        #about-page {
            position: absolute;
            top: 0;
            left: 100%;
            width: 100%;
            height: 100%;
            padding: 40px;
            background: var(--primary-color);
            transition: transform 0.5s ease;
        }

        .tutorial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .tutorial-card {
            background: #1f1f1f;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #3d3d3d;
            transition: transform 0.3s ease;
        }

        .tutorial-card:hover {
            transform: translateY(-5px);
        }

        #tools-page {
            position: absolute;
            top: 0;
            left: 100%;
            width: 100%;
            height: 100%;
            padding: 40px;
            background: var(--primary-color);
            transition: transform 0.5s ease;
        }
        #tools-page.slide-in {
            transform: translateX(-100%);
        }

        /* 响应式设计 */
        @media (max-width: 768px) {
            #home-page {
                flex-direction: column;
                padding: 20px;
            }

            .intro-section {
                padding-right: 0;
                border-right: none;
                border-bottom: 2px solid #3d3d3d;
                padding-bottom: 30px;
                margin-bottom: 30px;
            }

            .button-section {
                padding-left: 0;
                flex: 0 0 auto;
            }

            .nav-button {
                width: 100%;
            }
        }

        /* 过渡动画 */
        .slide-out {
            transform: translateX(-100%);
        }

        .slide-in {
            transform: translateX(-100%);
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: 1px solid var(--accent-color);
            color: var(--accent-color);
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1em;
            font-weight: 500;
            color: var(--accent-color);
            background-color: transparent;
            border: 2px solid var(--accent-color);
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn:hover {
            background-color: var(--accent-color);
            color: var(--primary-color);
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0, 255, 157, 0.3);
        }

        .btn:active {
            transform: translateY(0);
            box-shadow: 0 2px 10px rgba(0, 255, 157, 0.3);
        }

        .btn::after {
            content: '';
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            animation: ripple 0.6s ease-out;
        }

        @keyframes ripple {
            to {
                transform: translate(-50%, -50%) scale(2);
                opacity: 0;
            }
        }
        .bottom-image {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: -1;
            object-fit: cover;
            min-width: 100%;
            min-height: 100%;
            opacity: 0.5;
        }

    </style>
    <style>
        :root {
            --green-color: #4CAF50; 
            --yellow-color: #FFEB3B; 
            --red-color: #F44336; 
            --circle-size: 30px; 
            --circle-margin: 20px; 
            --transition-duration: 0.3s; 
        }

        .circle {
            width: var(--circle-size);
            height: var(--circle-size);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            font-weight: bold;
            margin: var(--circle-margin) auto;
            transition: transform var(--transition-duration), box-shadow var(--transition-duration); 
            cursor: pointer; 
        }

        .tooltip {
            position: relative;
            display: inline-block;
        }
        .tooltip .tooltip-content {
            position: absolute;
            bottom: -333%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transition: opacity 0.3s;
            pointer-events: none;
            min-width: 159px;
            text-align: center;
        }
        .tooltip:hover .tooltip-content {
            opacity: 1;
        }
        /* 箭头 */
        .tooltip .tooltip-arrow {
            position: absolute;
            bottom: -5px;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid rgba(0, 0, 0, 0.8);
        }

        .circle:hover {
            transform: scale(1.1);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); 
        }

        .green {
            background-color: var(--green-color);
        }

        .yellow {
            background-color: var(--yellow-color);
        }

        .red {
            background-color: var(--red-color);
        }
    </style>
    <?php
        function get_session_count($file_path = 'status\session.txt') {
            if (!file_exists($file_path)) {
                return 0;
            }
            $content = file_get_contents($file_path);
            if (preg_match('/会话数\s*\|\s*(\d+)/', $content, $matches)) {
                return (int)$matches[1] - 1;
            }
            return 0;
        }
        $session_count = get_session_count();
?>
</head>
<body>
    <div class="container">
        <!-- 首页 -->
        <div id="home-page">
            <div class="intro-section">
                <h1>学生目录</h1>
                <br>
                <p style="line-height: 1.6;">
                    欢迎来到 学生目录 2.0！
                </p>
                <br>
                <br>
                <ul style="list-style: none;">
                    <li style="padding: 10px 0;">✔ 校园网络接入服务</li>
                    <li style="padding: 10px 0;">✔ 学生共享文件传输服务</li>
                    <li style="padding: 10px 0;">✔ 其他技术支持<br><br></li> 
                    <li style="padding: 10px 0;">前往 <a style="color:rgb(0, 189, 73);" href="readme.html">学生目录使用说明</a></li>
                    <li style="padding: 10px 0;">前往 <a style="color:rgb(0, 189, 73);" href="index copy.html">旧版</a></li>
                </ul>
              
            </div>

            <div class="background-image">
                <img src=" "class="bottom-image">
            </div>


            <div class="button-section">
                <button class="nav-button" onclick="navigateToTutorials()">教程</button>
                <button class="nav-button" onclick='location.href=("http://10.88.202.71:5244")'>共享目录</button>
                <button class="nav-button" onclick="navigateToTools()">更多工具</button>
                <button class="nav-button" onclick="navigateToAbout()">关于</button>
                <div style="display: flex; justify-content: center; align-items: center; text-align: center; margin: 0 auto;">
                    <p style="margin: 0;">status:</p>
                    <div class="circle 
                        <?php 
                            if ($session_count < 4) {
                                echo 'green';
                            } elseif ($session_count >= 5 && $session_count <= 8) {
                                echo 'yellow';
                            } else {
                                echo 'red';
                            }
                        ?> tooltip" style="margin-left: 10px;">
                        <span class="tooltip-content">
                            当前会话数：<strong><?php echo $session_count; ?></strong>
                            <?php
                                if ($session_count < 5) {
                                    echo "<br>会话数较少，VPN质量较为稳定";
                                } elseif ($session_count >= 5 && $session_count <= 8) {
                                    echo "<br>会话数较多，VPN质量可能不稳定";
                                } else {
                                    echo "<br>会话数较多，VPN速度可能较慢";
                                }
                            ?>
                        </span>
                    </div>
                </div>

                
            </div>
        </div>

        <!-- 教程索引页 -->
        <div id="tutorial-page">
            <button class="back-button" onclick="goBack()">返回首页</button>
            <h2>教程目录</h2>
            <div class="tutorial-grid">
                <div class="tutorial-card">
                    <h3>关于如何正确删除powershadow的研究</h3>
                    <p>介绍了如何使用正确的方法删除powershadow来避免每次电脑重启后恢复原本的文件，详细解释了各种删除方式的原理，并给出了各种删除方法的优劣对比。</p>
                    <a href="tutorial/show.php?tutorial/powershadow.md" class="btn btn-outline-primary"">查看教程</a>

                </div>
                <div class="tutorial-card">
                    <h3>怎么在学校访问互联网</h3>
                    <p>介绍了如何使用正确的方法在学校访问互联网</p>
                    <a href="tutorial/show.php?file=web.md" class="btn btn-outline-primary">查看教程</a> <!-- 使用 outline按钮样式 -->

                </div>
                <div class="tutorial-card">
                    <h3>教师目录密码</h3>
                    <p>教师目录密码登记</p>
                    <a class="btn btn-outline-primary" onclick="checkPassword('tutorial/show.php?file=password.md')">查看教程</a>


                </div>
                <div class="tutorial-card">
                    <h3>教学楼中的WiFi密码登记</h3>
                    <p>登记了教学楼中的WiFi密码</p>
                    <a href="tutorial/show.php?file=web2.md" class="btn btn-outline-primary">查看教程</a> <!-- 使用 outline按钮样式 -->
                </div>
            </div>
        </div>
      
        <!-- 关于页 -->
        <div id="about-page">
            <button class="back-button" onclick="goBack()">返回首页</button>
            <h2>关于       </h2>
            <br>
            <div class="tutorial-grid" >
                <div style="border-radius: 10px;">
                    <p>《学生目录计划》</p><br>
                    <p>教师目录，一个专为教师设计的特殊文件夹，它依托SMB技术构建于校园网之上，旨在为教师群体提供高效便捷的文件传输服务。每位教师均拥有独立的账号与密码，凭借正确的登录信息，即可轻松访问个人文件及所属科目的共享资源。此外，还曾设有临时目录，供教师紧急存放文件之用（但该功能现已移除）。</p>
                    <br>
                    <p>然而，在这所广阔的校园里，学生群体同样需要文件存储与传输的便利。遗憾的是，学校目前并未向学生提供专门的文件传输服务，这给学生们在校内的文件管理带来了诸多不便。无论是易丢失的U盘，还是因老化、接触不良而频出问题的通用串行总线，都严重制约了学生在校内文件传输的效率和便捷性。</p>
                    <br>
                    <p>或许是由于校方的疏忽，或是受技术、经济等因素的限制，学生目录的缺失成为了亟待解决的问题。正是在这样的背景下，我们推出了“学生目录计划”。</p>
                    <br>
                    <p>鉴于学生人数远超教师，学生目录的规划与建设自然应更加周全与出色。经过深入比较与分析，我选择了网站作为学生目录的最佳载体，相较于SMB服务，网站以其卓越的兼容性、流畅性、美观性和灵活性而备受赞誉。</p>
                    <br>
                    <p>借助Apache技术，我在班级电脑上成功搭建了一台服务器，并将端口设置为80。因此，只需访问我所在班级的IP地址（10.88.202.71），即可轻松访问学生目录。</p>
                    <br>
                    <p>由于该计划未获得学校的直接支持，所以每一步都充满了挑战，网站的所有代码均由我一人独立完成。我诚挚地欢迎各位提出宝贵建议，以帮助我不断完善和优化学生目录。</p>
                    <br>
                    <p>目前，学生目录已具备文件上传、下载及教程查看等功能，更多功能正在不断完善中。敬请期待！</p>
                    <br>
                    <p>如有任何建议或疑问，欢迎与我联系，或通过邮件classicmcnet@163.com与我取得联系。</p>
                    <div style="text-align: right;">
                        <p><em>Yuebi</em></p>
                        <p><em>2024.10.31</em></p>
                    </div>
  
                </div>
            </div>
        </div>

        <!-- 工具选择页面 -->
        <div id="tools-page">
            <button class="back-button" onclick="goBack()">返回首页</button>
            <h2>工具选择</h2>
            <div class="tutorial-grid">
                <div class="tutorial-card">
                    <h3>时钟</h3>
                    <p>展示当前的时间</p>
                    <p>如果你想添加引言，请在留言簿中留言</p>
                    <a href="clock.html" class="btn btn-outline-primary">进入</a>

                </div>
                <div class="tutorial-card">
                    <h3>特殊的时钟(oﾟvﾟ)ノ</h3>
                    <p>展示当前的时间，不过引言变得有些奇怪 : )</p>
                    <p>如果你想添加引言，请在留言簿中留言</p>
                    <a href="clock2.html" class="btn btn-outline-primary">进入</a>
                </div>
                <div class="tutorial-card">
                    <h3>留言簿</h3>
                    <p>一个简单的留言簿，所有人都可以匿名地在这里记录任何事情</p>
                    <a href="comment.html" class="btn btn-outline-primary">进入</a>
                </div>
                
                <div class="tutorial-card">
                    <h3>敬请期待</h3>
                    <p>敬请期待</p>
                    <a href="#" class="btn btn-outline-primary">进入</a>
                </div>
            </div>
        </div>

    </div>

    <script>
        function navigateToTutorials() {
            document.getElementById('home-page').classList.add('slide-out');
            document.getElementById('tutorial-page').classList.add('slide-in');
        }
      
        function navigateToAbout() {
            document.getElementById('home-page').classList.add('slide-out');
            document.getElementById('about-page').classList.add('slide-in');
        }

        function navigateToTools() {
            document.getElementById('home-page').classList.add('slide-out');
            document.getElementById('tools-page').classList.add('slide-in');
        }

        function goBack() {
            document.getElementById('home-page').classList.remove('slide-out');
            document.getElementById('tutorial-page').classList.remove('slide-in');
            document.getElementById('about-page').classList.remove('slide-in');
            document.getElementById('tools-page').classList.remove('slide-in');        }

        // 触摸滑动支持
        let touchStartX = 0;
        document.addEventListener('touchstart', e => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.addEventListener('touchend', e => {
            const touchEndX = e.changedTouches[0].screenX;
            const diffX = touchStartX - touchEndX;
          
            if (Math.abs(diffX) > 50) {
                if (diffX > 0 && document.getElementById('tutorial-page').classList.contains('slide-in')) {
                    goBack();
                }
            }
        });
    </script>

<style>
    /* 新增字体和排版优化 */
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+SC:wght@300;500;700&display=swap');
  
    body {
        font-family: 'Noto Sans SC', system-ui, sans-serif;
        line-height: 1.8;
        letter-spacing: 0.5px;
    }

    /* 标题动画 */
    h1 {
        position: relative;
        animation: typewriter 1.2s steps(12) 0.5s both,
                   blinkCursor 0.8s infinite;
        overflow: hidden;
        white-space: nowrap;
        border-right: 2px solid var(--accent-color);
        max-width: max-content;
    }

    /* 列表项动画 */
    .intro-section li {
        opacity: 0;
        animation: slideIn 0.6s forwards;
        transform: translateX(-20px);
    }

    .intro-section li:nth-child(1) { animation-delay: 0.8s; }
    .intro-section li:nth-child(2) { animation-delay: 1.1s; }
    .intro-section li:nth-child(3) { animation-delay: 1.4s; }
    .intro-section li:nth-child(4) { animation-delay: 2.0s; }
    .intro-section li:nth-child(5) { animation-delay: 2.2s; }

    /* 卡片悬浮特效 */
    .tutorial-card {
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .tutorial-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(0, 255, 157, 0.2),
            transparent
        );
        background-size: 200% 200%;
        animation: gradientFlow 15s ease infinite;
        transition: 0.6s;
    }

    .tutorial-card:hover::before {
        left: 100%;
    }

    /* 按钮涟漪效果 */
    .nav-button {
        position: relative;
        overflow: hidden;
    }

    .nav-button::after {
        content: '';
        position: absolute;
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%) scale(0);
        animation: ripple 0.6s ease-out;
    }

    /* 页面加载动画 */
    @keyframes pageLoad {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* 定义关键帧动画 */
    @keyframes typewriter {
        from { width: 0; }
        to { width: 100%; }
    }

    @keyframes blinkCursor {
        from, to { border-color: transparent }
        50% { border-color: var(--accent-color) }
    }

    @keyframes slideIn {
        to { 
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes ripple {
        to {
            transform: translate(-50%, -50%) scale(2);
            opacity: 0;
        }
    }

    /* 动态背景效果 */
    body::after {
        content: '';
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, 
            rgba(0, 255, 157, 0.1) 0%, 
            transparent 60%);
        pointer-events: none;
        z-index: -1;
        animation: pulse 8s infinite;
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.2); }
    }

    /* 进度条动画 */
    .progress-bar {
        position: fixed;
        top: 0;
        left: 0;
        height: 3px;
        background: var(--accent-color);
        animation: progress 2s ease-in-out;
    }

    @keyframes progress {
        from { width: 0; }
        to { width: 100%; }
    }
</style>

<script>
    // 页面加载动画
    document.addEventListener('DOMContentLoaded', () => {
        // 创建进度条
        const progress = document.createElement('div');
        progress.className = 'progress-bar';
        document.body.prepend(progress);

        // 初始化元素动画
        setTimeout(() => {
            document.querySelectorAll('.intro-section li').forEach(li => {
                li.style.visibility = 'visible';
            });
        }, 1000);
    });

    // 增强按钮点击效果
    document.querySelectorAll('.nav-button').forEach(button => {
        button.addEventListener('click', function(e) {
            // 创建涟漪效果
            const ripple = document.createElement('div');
            ripple.style.cssText = `
                position: absolute;
                width: 100px;
                height: 100px;
                background: rgba(255,255,255,0.2);
                border-radius: 50%;
                transform: translate(-50%, -50%) scale(0);
                animation: ripple 0.6s ease-out;
            `;
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // 增强卡片交互
    document.querySelectorAll('.tutorial-card').forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            card.style.setProperty('--mouse-x', `${x}px`);
            card.style.setProperty('--mouse-y', `${y}px`);
        });
    });
    
</script>
<script>
    function checkPassword(targetUrl) {
        const correctPassword = "qwe";
        const userPassword = prompt("请输入密码以查看教程:"); 
        
        if (userPassword === correctPassword) {
            return location.href=(targetUrl); 
        } else {
            alert("密码错误，请重试。");
            return false;
        }
    }
</script>


</body>
</html>