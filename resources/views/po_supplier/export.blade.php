<table>
    <thead>
        <tr>
            <th colspan="2">Vendor</th>
            <th></th>
            <th></th>
            <th>Tgl PO</th>
            <th>ID PO</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">{{ $po->vendor->nama_vendor }}</td>
            <td></td>
            <td></td>
            <td>{{ $po->tgl_po }}</td>
            <td>{{ $po->id_po }}</td>
        </tr>
        <tr></tr>
        <tr>
            <td colspan="2">TOP</td>
            <td></td>
            <td></td>
            <td>Delivery By</td>
            <td></td>
            <td></td>
            <td></td>
            <td>Delivery Date</td>
            <td>Quot No</td>
            <td>PR No</td>
        </tr>
        <tr>
            <td colspan="2">{{ $po->top }}</td>
            <td></td>
            <td></td>
            <td>{{ $po->delivery_by }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $po->delivery_date }}</td>
            <td>{{ $po->quot_no }}</td>
            <td>{{ $po->pr_no }}</td>
        </tr>
        <tr></tr>
        <tr>
            <th>ID Detail PO</th>
            <th>UOM</th>
            <th>Qty PO</th>
            <th colspan="4">Nama Material</th>
            <th>Harga PO</th>
        </tr>
        @foreach($detail_pos as $d)
        <tr>
            <td>{{ $d->id_detail_po }}</td>
            <td>{{ $d->uom }}</td>
            <td>{{ $d->qty_po }}</td>
            <td colspan="4">{{ $d->material->part_name }}</td>
            <td>{{ $d->harga_po }}</td>
        </tr>
        @endforeach
        <tr></tr>
        <tr>
            <td colspan="10">Note: {{ $po->note_po }}</td>
        </tr>
    </tbody>
</table>