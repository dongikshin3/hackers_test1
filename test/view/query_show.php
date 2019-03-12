$query = "select * from review ORDER BY satisfacion DESC LIMIT 0,3" ;
					$result = mysqli_query($conn,$query);
					$num = "best";
					
					
					while($row = mysqli_fetch_row($result)){
						
						echo "
						<tr class='bbs-sbj'>
							<td>".$num."
												
							</td> 
							<td>".$row[4]."</td>
							<td>
								<a href='#'>
									<span class='tc-gray ellipsis_line'>수강 강의명 : ".$row[0]."</span>
									<strong class='ellipsis_line'>".$row[1]."</strong>
								</a>
								</td>
							<td>
								<span class='star-rating'>
									<span class='star-inner' style='width:80%'></span>
								</span>
							</td>
							<td class='last'>".$row[3]."</td>
						</tr>
						";	
						$num++;
					}	