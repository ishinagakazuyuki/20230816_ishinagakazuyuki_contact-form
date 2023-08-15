<div class="contact__content">
  <form class="contact-form" action="/contacts/confirm" method="post">
    @csrf
    <div class="contact-form__item">
        <p class="contact-form__item-fullname">お名前</p>
        <div class="contact-form__item-content" >
            <input class="contact-form__item-fullname-input" type="text" wire:model="family" wire:model.debounce.500ms="family" name="family">
            <p class="contact-form__item-example">例）山田</p>
            <div class="error_message">
                 @error('family') <span>{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="contact-form__item-content" >
            <input class="contact-form__item-fullname-input" type="text" wire:model="name" wire:model.debounce.500ms="name" name="name">
            <p class="contact-form__item-example">例）太郎</p>
            <div class="error_message2">
                 @error('name') <span>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="contact-form__item">
        <p class="contact-form__item-gender">性別</p>
        <div class="contact-form__item-radio" >
            <input class="contact-form__item-radio-gender" type="radio" name="gender" value="男性" 
                {{ old('gender','男性') == '男性' ? 'checked' : '' }} >
            <label class="contact-form__item-label-gender">男性</label>
            <input class="contact-form__item-radio-gender" type="radio" name="gender" value="女性" 
                {{ old('gender') == '女性' ? 'checked' : '' }}>
            <label class="contact-form__item-label-gender">女性</label>
        </div>
    </div>
    <div class="contact-form__item">
        <p class="contact-form__item-email">メールアドレス</p>
        <div class="contact-form__item-content">
            <input class="contact-form__item-common-input" type="email" name="email" wire:model="email" wire:model.debounce.500ms="email">
            <p class="contact-form__item-example-email">例）test@example.com</p>
            <div class="error_message2">
                @error('email') <span>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
    <div class="contact-form__item">
        <p class="contact-form__item-postcode">郵便番号</p>
        <p class="contact-form__item-postcode-icon">〒</p>
        <div class="contact-form__item-content">
            <input class="contact-form__item-postcode-input" type="text" name="postcode" onblur="toHalfWidth(this)"  wire:model="postcode" wire:model.debounce.500ms="postcode" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');">
            <p class="contact-form__item-example-postcode">例）123-4567</p>
            <div class="error_message2">
                @error('postcode') <span>{{ $message }}</span> @enderror
            </div>   
        </div>
    </div>
    <div class="contact-form__item">
        <p class="contact-form__item-address">住所</p>
        <div class="contact-form__item-content">
            <input class="contact-form__item-common-input" type="text" name="address"  wire:model="address" wire:model.debounce.500ms="address">
            <p class="contact-form__item-example-address">例）東京都渋谷区千駄ヶ谷1-2-3</p>
            <div class="error_message2">
                @error('address') <span>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="contact-form__item">
        <p class="contact-form__item-building_name">建物名</p>
        <div class="contact-form__item-content">
            <input class="contact-form__item-common-input" type="text" name="building_name"  wire:model="building_name" wire:model.debounce.500ms="building_name">
            <p class="contact-form__item-example-building_name">例）千駄ヶ谷マンション101</p>
            <div class="error_message2">
                @error('building_name') <span>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="contact-form__item2">
        <p class="contact-form__item-opinion">ご意見</p>
        <div class="contact-form__item-content">        
            <textarea class="contact-form__item-opinion-input" type="text"  wire:model="opinion" wire:model.debounce.500ms="opinion" name="opinion"></textarea>
            <div class="error_message2">
                @error('opinion') <span>{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="contact-form__item3">
        <button class="contact-form__button-submit" type="submit">確認</button>
    </div>
</div>
<script type="text/javascript">
function toHalfWidth(elm) {
    elm.value = elm.value.replace(/[Ａ-Ｚａ-ｚ０-９！-～]/g, function(s){
        return String.fromCharCode(s.charCodeAt(0)-0xFEE0);
    });
}
</script>