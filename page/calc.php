
        <main class="main">
            <section class="head">
                <h2 class="head__title">Таблица умножения</h2>
                <p class="head__date">Сегодня 10 Март 2023 год</p>
            </section>
            <form action="" class="form" method="post">
                <label class="form__label">
                    <span class="form__text">Число 1</span>
                    <input type="text" class="form__input" name="one" data-type="number">
                </label>
                <div class="form__mySelect">
                    <div class="form__select">
                        <div class="form__select-name">Выбирите знак</div>
                        <div class="form__select-option">
                            
                        </div>
                    </div>
                    <select name="symbol">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">*</option>
                        <option value="/">/</option>
                    </select>
                </div>
                <label class="form__label">
                    <span class="form__text">Число 2</span>
                    <input type="text" class="form__input" name="two" data-type="number"> 
                </label>
                <button class="form__btn">Посчитать</button>
                
                <?
                
                $one = $_POST['one'];
                $symbol = $_POST['symbol'];
                $two = $_POST['two'];
                if ($symbol == '*') {
                    $symbol = $one * $two;
                }elseif($symbol == '/'){
                    $symbol = $one / $two;
                }elseif($symbol == '+'){
                    $symbol = $one + $two;
                }elseif($symbol == '-'){
                    $symbol = $one - $two;
                }
                ?>
                <button class="form__btn result"><?=$symbol?></button>
                


            </form>
        </main>