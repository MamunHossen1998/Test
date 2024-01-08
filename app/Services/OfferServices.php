<?php 
    namespace App\Services;
    use App\Models\User;
    use App\Models\Offer;
    use Illuminate\Support\Facades\DB;

    class OfferServices{
        public function store(array $data,$image=null)
        {
            DB::transaction(function () use($data ,$image) {
                $data = array_merge(
                    ['author_id' => auth()->user()->id],
                    $data
                );
                $offer = Offer::create($data);
                $offer->categories()->sync($data['categories']);
                $offer->locations()->sync($data['locations']);
                if($image){
                $offer
                ->addMedia($image)
                ->toMediaCollection();
                }
            },2);
        }
        public function update(Offer $offer,array $data,$image=null)
        {
            DB::transaction(function () use($offer,$data ,$image) {
                $data = array_merge(
                    ['author_id' => auth()->user()->id],
                    $data
                );
                $offer = tap($offer)->update($data);
                $offer->categories()->sync($data['categories']);
                $offer->locations()->sync($data['locations']);
                if($image){
                $offer
                ->addMedia($image)
                ->toMediaCollection();
                }
            },2);
        }
    }
?>