<?php 
    class TattoosController extends AppController{

        public function index($prenom){
            //Je récupère toutes les images de tattouage en base.
            
            $this->set('prenom', $prenom);
            debug($this->Tattoo->find('all'));
            //debug($this->Tattoo);
            //die("tattoos");
        }
        
        public function view($id){
            debug($tattoo = $this->Tattoo->findById($id));
        }
        
        public function add(){
            if(!empty($this->request->data)){
                /**
                    JUST TO KNOW IF A TATTO HAS THE SAME NAME
                    $link = $this->Tattoo->findByName($this->request->data['Tattoo']['name']);
                **/
                $name_image = 'tattoo-'.uniqid('', true);
                $extension = pathinfo($this->request->data['Tattoo']['image_file']['name'],PATHINFO_EXTENSION);
                
                if(
                    !empty($this->request->data['Tattoo']['image_file']['tmp_name']) &&
                    in_array(strtolower($extension), array('jpg', 'jpeg', 'gif','png'))
                ){
                    move_uploaded_file($this->request->data['Tattoo']['image_file']['tmp_name'], IMAGES . 'tattoos' . DS . $name_image . '.' . $extension);
                    
                    $this->Tattoo->create(array('name'=> $this->request->data['Tattoo']['name'], 'image'=> $name_image.'.'.$extension), true);
                    $this->Tattoo->save(null, true);
                    die("Ajout réussi ".$this->Tattoo->id);
                }
                else if(!empty($this->request->data['Tattoo']['image_file']['tmp_name'])){
                    $this->Session->setFlash("Le format de votre image n'est pas correct");
                    
                }
                else{
                    die('L\'ajout à échouer: vous devez uploader une image.');
                }
            }
            
            else{
                //die('tamère');
            }
            //Je récupère la liste des catégorie & l'envoi à la vue
            //Je récupère l'ID de l'user
            
            //IF tous les champs neccesaire sont renseigné?
                //Je récupère   $name;
                //              $image;
                //              $description;
                //              $mots_clefs /!\ se renseigner pour la gestion des mots clefs. user_in_keyword ?
                //              $categories[]; /!\ se renseigner pour categories multiples user_in_categorie ?
                
                //Je récupère la/les catégories que l'user a renseigné
                //FOREACH 
                    //IF la catégories existe en base?
                        //Je récupère l'id de la catégorie
                    //ELSE Message d'erreur $message = "Il semble que vous ayez renseigné une categorie qui n'existe pas";
            
                //Je fais l'upload de l'image uploadImage($image);
                //IF uploadImage(); me retourne $uploaded = true;
                    //Je récupère $path_image;
                    //Je fais l'insertion en base de donnée / $name, $path_image, $description, $id_categorie
                //ELSE je retourne à l'utilisateur $message.
                
            
            //Sinon j'informe l'utilisateur que tous les champs sont obligatoire $message. 
        }
        
        public function edit(){
        }
        
        public function delete(){
        }
    }