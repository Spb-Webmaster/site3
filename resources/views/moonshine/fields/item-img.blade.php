@if( $item->img )

<x-moonshine::table>
    <x-slot:tbody>
        <tr>

            <td>


                <x-moonshine::form.input-wrapper :name="$element->name('img')" label="Полное изображение">


                    <img src="{{ asset('storage/' . $item->img) }}" alt="{{$item->title}}">


                </x-moonshine::form.input-wrapper>

            </td>


        </tr>


    </x-slot:tbody>

</x-moonshine::table>
@endif
