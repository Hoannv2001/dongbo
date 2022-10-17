<?php

namespace App\Entity;

use App\Repository\BookRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $bookName;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity=Author::class, inversedBy="books")
     * @ORM\JoinColumn(nullable=false)
     */
    private $authorID;

    /**
     * @ORM\ManyToMany(targetEntity=IssueBook::class)
     */
    private $issueBook;

    /**
     * @ORM\ManyToMany(targetEntity=IssueBook::class, inversedBy="books")
     */
    private $issue;

    public function __construct()
    {
        $this->issueBook = new ArrayCollection();
        $this->issue = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getBookName(): ?string
    {
        return $this->bookName;
    }

    public function setBookName(string $bookName): self
    {
        $this->bookName = $bookName;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAuthorID(): ?Author
    {
        return $this->authorID;
    }

    public function setAuthorID(?Author $authorID): self
    {
        $this->authorID = $authorID;

        return $this;
    }

    /**
     * @return Collection<int, IssueBook>
     */
    public function getIssue(): Collection
    {
        return $this->issue;
    }

    public function addIssue(IssueBook $issue): self
    {
        if (!$this->issue->contains($issue)) {
            $this->issue[] = $issue;
        }

        return $this;
    }

    public function removeIssue(IssueBook $issue): self
    {
        $this->issue->removeElement($issue);

        return $this;
    }

}
