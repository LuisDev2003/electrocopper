export type SelectorOne = (
  element: string,
  scope?: Document,
) => HTMLElement | null;

export type SelectorAll = (element: string) => NodeListOf<HTMLElement>;

export interface FindAllOptions {
  endpoint: string;
  operation?: string;
}

export type FindAll<T> = (options: FindAllOptions) => Promise<T>;
