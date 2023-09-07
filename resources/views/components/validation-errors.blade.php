@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-red-600">{{ __('พบข้อผิดพลาด อีเมล์หรือรหัสผ่านไม่ถูกต้อง') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
         
        </ul>
    </div>
@endif
