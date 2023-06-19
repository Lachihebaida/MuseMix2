<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Mapping\Annotation\Uploadable;
use Vich\UploaderBundle\Mapping\Annotation\UploadableField;
use App\Form\DateTimeType;


#[ORM\Entity(repositoryClass: MusicRepository::class)]
#[Vich\Uploadable]
class Music
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $author = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $imageName = null;
    // #[Vich\UploadableField(mapping: 'musics', fileNameProperty: 'imageName')]
    // private ?File $imageName = null;

    // NOTE: This is not a mapped field of entity metadata, just a simple property.
    // #[ORM\Column(length: 255)]
    // private ?string $audioFile = null;
    #[Vich\UploadableField(mapping: 'music', fileNameProperty: 'audioName')]
    private ?File $audioFile = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'musics')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Category $category = null;

    #[ORM\ManyToMany(targetEntity: Playlist::class, mappedBy: 'music')]
    private Collection $playlists;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'musics')]
    private Collection $users;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $length = null;

    #[ORM\Column(length: 255)]
    private ?string $audioName = null;

    public function __construct()
    {
        $this->playlists = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): static
    {
        $this->author = $author;

        return $this;
    }

    // public function getImageName(): ?string
    // {
    //     return $this->imageName;
    // }

    // public function setImageName(?string $imageName): static
    // {
    //     $this->imageName = $imageName;

    //     return $this;
    // }


/**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $ImageName
     */
    // public function setImageName(?File $imageName = null): void
    // {
    //     $this->imageName = $imageName;

    //     if (null !== $imageName) {
    //         // It is required that at least one field changes if you are using doctrine
    //         // otherwise the event listeners won't be called and the file is lost
    //          $this->updatedAt = new \DateTimeImmutable();
    //     }
    // }

    // public function getImageName(): ?File
    // {
    // return $this->imageName;
    // }



    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $audioFile
     */
    public function setAudioFile(?File $audioFile = null): void
    {
        $this->audioFile = $audioFile;

        if (null !== $audioFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getAudioFile(): ?File
    {
    return $this->audioFile;
    }

    // public function setAudioFile(string $audioFile): static
    // {
    //     $this->audioFile = $audioFile;

    //     return $this;
    // }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, Playlist>
     */
    public function getPlaylists(): Collection
    {
        return $this->playlists;
    }

    public function addPlaylist(Playlist $playlist): static
    {
        if (!$this->playlists->contains($playlist)) {
            $this->playlists->add($playlist);
            $playlist->addMusic($this);
        }

        return $this;
    }

    public function removePlaylist(Playlist $playlist): static
    {
        if ($this->playlists->removeElement($playlist)) {
            $playlist->removeMusic($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->addMusic($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            $user->removeMusic($this);
        }

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLength(): ?\DateTimeInterface
    {
        return $this->length;
    }

    public function setLength(?\DateTimeInterface $length): static
    {
        $this->length = $length;

        return $this;
    }

    public function getAudioName(): ?string
    {
        return $this->audioName;
    }

    public function setAudioName(string $audioName): static
    {
        $this->audioName = $audioName;

        return $this;
    }
}
