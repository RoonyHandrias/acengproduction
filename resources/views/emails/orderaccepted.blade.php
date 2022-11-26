@component('mail::message')
# Reservasi Anda telah Disdetujui!
Reservasi anda telah disetujui oleh Admin.
langkah selanjutnya adalah nelakukan konfirmasi pemesanan dengan mengupload foto KTP


silakan upload foto KTP anda pada website

# Detail Reservasi
<b>Nama : {{$payment->user->name}}</b><br>
<b>No Invoice : {{ $payment->no_invoice }}</b> <br>
<b>Tanggal Pengambilan : {{ date('d M Y H:i', strtotime($payment->order->first()->starts)) }}</b>
@component('mail::table')
| Alat | Durasi | Harga |
| ------------- |:-------------:| --------:|
@foreach ($payment->order as $item)
| {{$item->alat->nama_alat}} | {{ $item->durasi }} Jam | @money($item->harga) |
@endforeach
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent