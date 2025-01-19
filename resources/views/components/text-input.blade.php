@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'form-control border-secondary bg-light text-dark focus:border-primary focus:ring-primary rounded shadow-sm']) }}>