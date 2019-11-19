<?php

namespace App\Http\Controllers;
use App\promotionNews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tintucmore extends Controller
{


     public function getLoadMore($offset)
		    {
		        $data = DB::table('promotion_news')
		        		->select('*')
		        		->where('status',1)
		        		->limit(5)
		        		->offset($offset)
		        		->get();
		       			$data=(array)$data;
		       return $data; 		
		    }

    public function loadMore( Request $request)
			{
				$offset = $request->input('offset');
				$tintuc3 = $this->getLoadMore($offset);
				$res['status'] = '';
				$res['data']   = '';

					foreach ($tintuc3 as $tintuc3) {
				if (count($tintuc3) == 0) {
					$res['status'] = 'NULL';
					} else {
						$res['status'] = 'success';
						$htmlAdd = '';                    
		        			
							foreach ($tintuc3 as $tintuc3) {
								$tintuc3=(array)$tintuc3;
								$htmlAdd.='<li>';
								$htmlAdd.='<a href="pages/newdetail/'.$tintuc3['id'] .'">';
								$htmlAdd.='<span class="row">';
								$htmlAdd.= '<div class="span-group">';
								$htmlAdd.= ' <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">';
								$htmlAdd.= '<img width="200px" src="/project3/public/uploads/ImagePromotionNews/'.$tintuc3['image'].'" alt="" class="anhtintuccu">';
								$htmlAdd.= ' </div>';
								$htmlAdd.= '<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
								$htmlAdd.=' <h3 class="title">'.$tintuc3['title'].'</h3>';
								$htmlAdd.='<p class="tomtat">'.$tintuc3['summary'].'</p>';		
								$htmlAdd.='<p class="time_created">'.date('d/m/Y H:i:s A', $tintuc3['time_created']).'</p>';
								$htmlAdd.='</div>';
								$htmlAdd.='</span>';
								$htmlAdd.='</a>';
								$htmlAdd.='<hr>';
								$htmlAdd.='</li>';
							}
							$res['data']   = $htmlAdd;
					}
				}
				echo json_encode($res);
			}
}
