<x-mail::message>
# Introduction

Congrats, you're now a paid member!
    Your purchase details

   <p>Your plan: {{$plan}}</p>
    <p>Expire date: {{$billingEnds}}</p>
    Thank you for your purchase, have fun.

<x-mail::button :url="''">
Go to website
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
